<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryContract
{

    public function getUsersExceptAdmin()
    {
        return User::where('id','!=',auth()->user()->id)->get();
    }
}
