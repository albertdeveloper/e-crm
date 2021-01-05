<?php

namespace App\Repositories;

interface ContactRepositoryContract
{
    public function process($request);
    public function getContacts($request);
    public function findByIdWithUser($id);
    public function findByName($lead);
    public function findById($id);
}
