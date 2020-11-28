<?php

namespace App\Repositories;

interface RoleRepositoryContract
{
    public function process($request);
    public function all();
    public function findById($id);
}
