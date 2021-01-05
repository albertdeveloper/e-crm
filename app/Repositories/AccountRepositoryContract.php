<?php

namespace App\Repositories;

interface AccountRepositoryContract
{
    public function getAccounts($request);
    public function getAllAccounts();
    public function process($request);
    public function findById($id);
    public function findByName($lead);
}
