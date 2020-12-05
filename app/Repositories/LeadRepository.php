<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadStatus;

class LeadRepository implements LeadRepositoryContract
{

    public function findById($id)
    {
        return Lead::findOrfail($id);
    }

    public function getAllLeadSource()
    {
        return LeadSource::get();
    }

    public function getAllLeadStatus()
    {
        return LeadStatus::get();
    }

    public function getLeads($request)
    {
        $query = Lead::query();
        $query->with('leadStatus', 'leadSource');

        if(sizeof($request) > 0 && isset($request['search'])) {
            $query->where(function($q) use($request) {
                $searchField = '%'.$request['search'].'%';
                $q->where(\DB::raw('concat(first_name, " ", last_name)'),'like',$searchField)
                    ->orWhere('company','like',$searchField);
            });
        }

        return $query->paginate();
    }

    public function process($request)
    {
      $lead =  Lead::updateOrCreate(['id' => $request->id], [
            'owner' => $request->owner,
            'company' => $request->company,
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'mobile' => $request->mobile,
            'website' => $request->website,
            'industry' => $request->industry,
            'no_employee' => $request->no_employee,
            'lead_source_id' => $request->lead_source,
            'lead_status_id' => $request->lead_status,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country
        ]);

      return $lead;
    }
}
