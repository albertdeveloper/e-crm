<?php
namespace App\Repositories;

use App\Models\Account;

class AccountRepository implements AccountRepositoryContract
{
    public function getAccounts()
    {
        return Account::get();
    }
}
