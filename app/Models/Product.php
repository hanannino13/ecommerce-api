<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'price', 'quantity', 'cat_id'];

    public function category()
{
    return $this->belongsTo(Category::class, 'cat_id');
}
}
