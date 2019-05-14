<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 03.05.2019
 * Time: 17:58
 */


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent;


class Book extends Eloquent\Model
{

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'books_tags');
    }

}