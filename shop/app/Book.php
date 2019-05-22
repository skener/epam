<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Book extends Model
{
    public $perPage = 2;

    public function tags()
    {

        return $this->belongsToMany(\App\Tag::class, 'book_tag');
    }
}
