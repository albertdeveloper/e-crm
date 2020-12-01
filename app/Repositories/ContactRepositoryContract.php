<?php

namespace App\Repositories;

interface ContactRepositoryContract
{
    public function process($request);
    public function getContacts();
    public function findById($id);
}
