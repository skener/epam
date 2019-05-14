<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 03.05.2019
 * Time: 17:58
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

use app\Tag;

class Book extends Model
{
    public $perPage=2;

    public function tags()
    {

        return $this->belongsToMany(Tag::class, 'books_tags');
    }

}