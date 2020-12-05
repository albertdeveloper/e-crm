<?php

namespace App\Repositories;

interface RoleRepositoryContract
{
    public function process($request);
    public function allWithPermissions();
    public function findById($id);
}
