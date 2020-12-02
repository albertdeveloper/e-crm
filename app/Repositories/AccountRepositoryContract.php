<?php

namespace App\Repositories;

interface AccountRepositoryContract
{
    public function getAccounts();
    public function process($request);
}
