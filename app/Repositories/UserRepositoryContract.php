<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    public function getUsersExceptAdmin();
}
