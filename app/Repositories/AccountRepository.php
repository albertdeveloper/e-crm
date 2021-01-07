<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Support\Facades\Crypt;

class AccountRepository implements AccountRepositoryContract
{
    public function getAccounts($request)
    {
        $query = Account::query();

        if (sizeof($request) > 0 && isset($request['search'])) {
            $query->where(function ($q) use ($request) {
                $search_field = '%' . $request['search'] . '%';
                $q->where('name', 'like', $search_field)
                    ->orWhere('owner', 'like', $search_field);
            });
        }
        return $query->paginate();
    }

    public function getAllAccounts()
    {
        return Account::paginate();
    }

    public function process($request)
    {
        Account::updateOrCreate(['id' => $request->id], [
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

    public function findByName($lead)
    {
        return Account::where('name', $lead->company)->first();
    }


}
