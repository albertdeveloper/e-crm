<?php

namespace App\Repositories;

use App\Events\LeadConvert;
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
        $account = $this->process_account($lead_data);
        $this->process_contact($account, $lead_data);
        event(new LeadConvert($account));
        $lead_data->delete();
    }

    public function process_account($lead)
    {
        $account = Account::where('name', $lead->company)->first();

        if ($account === null) {
            $account = new Account();
            $account->name = $lead->company;
            $account->owner = $lead->company_owner;
            $account->industry = $lead->industry;
            $account->no_employee = $lead->no_employee;
            $account->annual_revenue = $lead->annual_revenue;
            $account->phone = $lead->account;
            $account->save();
        }

        return $account;
    }

    public function process_contact($account, $lead)
    {
            $contact = new Contact();
            $contact->user_id = $lead->user_id;
            $contact->account_id = $account->id;
            $contact->title = $lead->title;
            $contact->email = $lead->email;
            $contact->department = $lead->department;
            $contact->phone = $lead->phone;
            $contact->fax = $lead->fax;
            $contact->mobile = $lead->mobile;
            $contact->lead_source_id = $lead->lead_source_id;
            $contact->salutation = $lead->salutation;
            $contact->first_name = $lead->first_name;
            $contact->last_name = $lead->last_name;
            $contact->save();
    }
}
