<?php
namespace App\Repositories;

use App\Models\Account;

class AccountRepository implements AccountRepositoryContract
{
    public function getAccounts()
    {
        return Account::get();
    }

    public function process($request)
    {
         Account::updateOrCreate(['id' => $request->id],[
             'name' => $request->name,
             'owner' => $request->owner,
             'industry' => $request->industry,
             'no_employee' => $request->no_employee,
             'annual_revenue' => $request->annual_revenue,
             'phone' => $request->phone,
         ]);
    }

    public function findById($id)
    {
        return Account::findOrFail($id);
    }


}
