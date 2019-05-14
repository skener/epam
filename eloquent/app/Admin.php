<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $table = 'users';

    public static function findByEmail($email)
    {
        return $user = Admin::all()->where('email', $email)->toArray();

    }

    public static function authenticate($email, $password)
    {

        $user = static::findByEmail($email);

        $user = array_shift($user);

        if ( ! empty($user)) {

            $password_hash = $user['password'];

            if (password_verify($password, $password_hash)) {

                return $user;

            }
        }

        return false;

    }

}