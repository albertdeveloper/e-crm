<?php

namespace App\Listeners;

use App\Events\LeadConvert;
use App\Models\Account;
use App\Models\User;
use App\Notifications\AccountCreatedNotification;
use Illuminate\Support\Facades\Notification;

class LeadConvertListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LeadConvert $event)
    {
        $admins = User::whereHas('roles',function($q){
            $q->where('roles.id',1);
        })->get();


        Notification::send($admins, new AccountCreatedNotification($event->account));
    }
}
