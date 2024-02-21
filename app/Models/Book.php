<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku_code',
        'book_name',
        'author',
        'qty'
    ];



    public function reviews()
    {
        return $this->hasMany('App\Models\UserBookReviews', 'book_id', 'id');
       
    }
}
