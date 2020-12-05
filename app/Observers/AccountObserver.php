<?php

namespace App\Observers;

use App\Models\Account;
use App\Models\User;
use App\Notifications\AccountCreatedNotification;
use Illuminate\Support\Facades\Notification;

class AccountObserver
{
    private $admins;

    public function __construct()
    {
        $this->admins = User::whereHas('roles',function($q){
            $q->where('roles.id',1);
        })->get();

    }
    /**
     * Handle the Account "created" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function created(Account $account)
    {
       Notification::send($this->admins,new AccountCreatedNotification($account));
    }

    /**
     * Handle the Account "updated" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function updated(Account $account)
    {
        //
    }

    /**
     * Handle the Account "deleted" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function deleted(Account $account)
    {
        //
    }

    /**
     * Handle the Account "restored" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function restored(Account $account)
    {
        //
    }

    /**
     * Handle the Account "force deleted" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function forceDeleted(Account $account)
    {
        //
    }
}
