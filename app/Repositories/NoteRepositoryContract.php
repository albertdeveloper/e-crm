<?php

namespace App\Repositories;

interface NoteRepositoryContract
{
    public function process($request);
    public function defineModel($type);
    public function findByNoteAbleId($id);
    public function delete($id);
    public function findById($id);
}
