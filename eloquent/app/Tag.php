<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 03.05.2019
 * Time: 17:58
 */

namespace app;

use Illuminate\Database\Eloquent\Model;
use app\Book;

class Tag extends Model
{

    public function tags()
    {
        return $this->hasMany(Book::class, 'books_tags');
    }
}