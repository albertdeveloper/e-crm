<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function getUsersExceptAdmin();
    public function process($request);
    public function findByIdWithRole($id);
    public function findById($id);
}
