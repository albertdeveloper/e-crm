<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Role;

class RoleRepository implements RoleRepositoryContract
{
    public function process($request)
    {
        $create_role = Role::updateOrCreate(['id' => $request->id],
            [
                'title' => $request->title,
            ]);

        if (sizeof($request->permissions) > 0) {
            if ($request->permissions !== null || $request->set_all !== null) {
                $permissions = ($request->set_all !== null) ? Permission::get() : $request->permissions;

                foreach ($permissions as $k => $value) {

                    $real_value = $value->id ?? $value;
                    if (!in_array($real_value, $create_role->permissions()->pluck('permissions.id')->toArray())) $create_role->permissions()->attach($real_value);
                }
            }
        }
    }

}