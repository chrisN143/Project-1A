<?php

namespace App\Livewire\Product;

use Illuminate\Support\Str;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Detail extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $objId;
    public $productId;
    public $oldImage;
    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $price;
    #[Rule('required|image|max:4096')]
    public $image;

    public function mount()
    {
        if ($this->objId) {
            $product = Product::find($this->objId);
            $this->name = $product->name;
            $this->price =  $product->price;
            $this->oldImage = $product->getImage();
        }
    }

    public function store()
    {
        // kalo gambar tidak kosong
        if ($this->image != null) {
            $this->validate();
            $this->image->store('images', 'public');
        }

        if ($this->objId) {
            //Update
            $product = Product::find($this->objId);
            $product->update([
                'name' => $this->name,
                'price' => str_replace(",", ".", str_replace(".", "", $this->price)),
                'code' => 'Product-' . Str::random(10),
            ]);
        } else {
            //Create
            Product::create([
                'name' => $this->name,
                'price' => str_replace(",", ".", str_replace(".", "", $this->price)),
                'code' => 'Product-' . Str::random(10),
            ]);
        }

        return redirect()->route('product.index');
        // return dd($path);
    }

    public function render()
    {
        return view('livewire.product.detail');
    }
}
