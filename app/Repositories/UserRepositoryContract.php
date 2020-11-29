<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function getUsersExceptAdmin();
    public function process($request);
}
