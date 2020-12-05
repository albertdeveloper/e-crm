<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryContract
{

    public function getUsersExceptAdmin()
    {
        return User::with('roles')->get();
    }

    public function process($request)
    {
        $user = User::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $user->roles()->sync($request->role);
    }

    public function findByIdWithRole($id)
    {
        return User::with('roles')->findOrFail($id);
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        $user->delete();
    }
}
