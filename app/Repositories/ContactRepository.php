<?php
namespace App\Repositories;

use App\Models\Contact;

class ContactRepository implements ContactRepositoryContract
{
    public function process($request)
    {
       return Contact::updateOrCreate(['id'=>$request->id],[
            'account_id' => $request->account_name,
            'lead_source_id' => $request->lead_source,
            'user_id' => $request->owner_id,
            'salutation' => $request->salutation,
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

    }

    public function getContacts($request = false)
    {
        $query = Contact::query();
        $query->with(['account','user']);
        if(sizeof($request) && isset($request['search']))
        {
            $query->where(function($q) use($request) {
                $search_field = '%'.$request['search'].'%';
                $q->where(\DB::raw('concat(first_name," ",last_name)'),'like',$search_field);
            });
        }
        return  $query->paginate();
    }

    public function findByIdWithUser($id)
    {
        return Contact::with(['user','account','notes.user'])->findOrFail($id);
    }
}
