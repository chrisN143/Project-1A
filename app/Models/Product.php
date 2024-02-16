<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'price',
        'name',
        'image'
    ];
    protected $guarded = [
        'id'
    ];
    public function getImage()
    {
        return Storage::url('images/' . $this->image);
    }
}
