<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Tag extends Model
{
    public function books()
    {
        return $this->belongsToMany(\App\Book::class, 'book_tag');
    }
}
