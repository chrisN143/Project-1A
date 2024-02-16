<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Datatable extends Component
{
    public $data;

    public function destroy($id)
    {
        // $product = Product::find($id);
        // $product->delete();
        $singleImage = Product::findOrFail($id);
        Storage::delete($singleImage->image);
        $singleImage->delete();
        session()->flash('success', 'Image deleted Successfully!!');
        $this->reset();
    }

    public function render()
    {
        $this->data = Product::all();

        return view('livewire.product.datatable');
    }
}
