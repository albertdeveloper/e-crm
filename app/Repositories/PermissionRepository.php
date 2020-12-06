<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{

    public function process($request)
    {
        Permission::updateOrCreate(['id' => $request->id],
        [
            'title' => $request->title,
        ]);
    }

    public function all()
    {
         return Permission::orderBy('title','asc')->paginate();
    }

    public function findById($id)
    {
        return Permission::findOrFail($id);
    }

}
