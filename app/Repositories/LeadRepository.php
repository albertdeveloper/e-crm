<?php

namespace App\Repositories;

use App\Models\LeadSource;
use App\Models\LeadStatus;

class LeadRepository implements LeadRepositoryContract
{

    public function getAllLeadSource()
    {
        return LeadSource::get();
    }

    public function getAllLeadStatus()
    {
        return LeadStatus::get();
    }
}
