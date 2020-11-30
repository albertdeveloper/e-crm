<?php
namespace App\Repositories;

use App\Models\Contact;

class ContactRepository implements ContactRepositoryContract
{
    public function process($request)
    {
       $contact =  Contact::updateOrCreate(['id'=>$request->id],[
            'account_id' => $request->account_name,
            'lead_source_id' => $request->lead_source,
            'owner' => $request->owner,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'department' => $request->department,
            'phone' => $request->phone,
            'home_phone' => $request->home_phone,
            'other_phone' => $request->other_phone,
            'fax'       => $request->fax,
            'mobile'   => $request->mobile,
            'date_of_birth' => $request->date_of_birth,
            'assistant' => $request->assistant,
            'assistant_phone' => $request->assistant_phone,
        ]);

       return $contact;
    }
}
