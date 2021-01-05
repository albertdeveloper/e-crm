<?php

namespace App\Repositories;

interface LeadRepositoryContract
{
    public function getAllLeadSource();
    public function getAllLeadStatus();
    public function getLeads($request);
    public function process($request);
    public function findById($id);
    public function findByIdWithUser($id);
    public function process_convert($id);
}
