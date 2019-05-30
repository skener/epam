<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Book extends Model
{

    public $perPage = 2;

    protected $dates = [
        'date',
    ];

    protected $fillable = [
        'poster',
        'name',
        'author',
        'price',
        'date',

    ];

    public function tags()
    {

        return $this->belongsToMany(\App\Tag::class, 'book_tag');

    }

}
