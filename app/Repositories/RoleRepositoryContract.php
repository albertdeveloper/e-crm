<?php

namespace App\Repositories;

interface RoleRepositoryContract
{
    public function process($request);
    public function allWithPermissions();
    public function all();
    public function findById($id);
}
