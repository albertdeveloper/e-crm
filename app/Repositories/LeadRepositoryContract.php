<?php

namespace App\Repositories;

interface LeadRepositoryContract
{
    public function getAllLeadSource();
    public function getAllLeadStatus();
    public function getLeads();
    public function process($request);
}
