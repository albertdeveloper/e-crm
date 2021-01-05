<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use App\Models\Account;

class LeadRepository implements LeadRepositoryContract
{

    public function findById($id)
    {
        return Lead::findOrfail($id);
    }

    public function findByIdWithUser($id)
    {
        return Lead::with(['user', 'leadStatus', 'leadSource', 'notes.user'])->findOrfail($id);
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
        $query->with(['leadStatus', 'leadSource']);

        if (sizeof($request) > 0 && isset($request['search'])) {
            $query->where(function ($q) use ($request) {
                $searchField = '%' . $request['search'] . '%';
                $q->where(\DB::raw('concat(first_name, " ", last_name)'), 'like', $searchField)
                    ->orWhere('company', 'like', $searchField);
            });
        }

        return $query->paginate();
    }

    public function process($request)
    {
        return Lead::updateOrCreate(['id' => $request->id], [
            'user_id' => $request->owner_id,
            'company_owner' => $request->company_owner,
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
    }

    public function process_convert($id)
    {
        $lead_data = $this->findById($id);
        $this->process_lead_convert($lead_data);
    }

    public function process_lead_convert($lead_data)
    {
        $account = Account::where('name', $lead_data->company);

        $contact = Contact::where([
            'salutation' => $lead_data->salutation,
            'first_name' => $lead_data->first_name,
            'last_name' => $lead_data->last_name,
        ]);

        //save the account if non exists
        if ($account->count() == 0) {
            $account = new Account();
            $account->name           = $lead_data->company;
            $account->owner          = $lead_data->company_owner;
            $account->industry       = $lead_data->industry;
            $account->no_employee    = $lead_data->no_employee;
            $account->annual_revenue = $lead_data->annual_revenue;
            $account->phone          = $lead_data->account;
            $account->save();

            $account = $account->id;
        } else $account = $account->first()->id;

        // create contact if non exists
        if ($contact->count() == 0 && $account !== null) {
            $contact = new Contact();
            $contact->user_id           = $lead_data->user_id;
            $contact->account_id        = $account;
            $contact->title             = $lead_data->title;
            $contact->email             = $lead_data->email;
            $contact->department        = $lead_data->department;
            $contact->phone             = $lead_data->phone;
            $contact->fax               = $lead_data->fax;
            $contact->mobile            = $lead_data->mobile;
            $contact->lead_source_id    = $lead_data->lead_source_id;
            $contact->salutation        = $lead_data->salutation;
            $contact->first_name        = $lead_data->first_name;
            $contact->last_name         = $lead_data->last_name;
            $contact->save();
        }

        //destroy lead  after converted
        $lead_data->delete();
    }
}
