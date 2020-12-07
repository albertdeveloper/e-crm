<?php

namespace App\Repositories;

interface NoteRepositoryContract
{
    public function process($request);
    public function defineModel($type);
}
