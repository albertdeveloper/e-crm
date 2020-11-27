<?php

namespace App\Repositories;

interface PermissionRepositoryContract
{
    public function process($request);
    public function findById($id);
    public function all();
}
