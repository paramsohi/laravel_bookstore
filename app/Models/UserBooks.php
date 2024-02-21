<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBooks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'qty',
    ];


    public function book()
    {
        return $this->hasOne('App\Models\Book', 'id', 'book_id');
    }
}
