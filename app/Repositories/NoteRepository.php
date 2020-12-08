<?php

namespace App\Repositories;


use App\Models\Note;

class NoteRepository implements NoteRepositoryContract
{
    public function process($request)
    {
        $model = $this->defineModel($request->type);

        $data = $model::findOrFail($request->passId);

        $data->note()->updateOrCreate(['id' => $request->id], [
            'title' => $request->title,
            'note' => $request->note,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
        ]);

        return str_replace('s', '', $request->type);

    }

    public function defineModel($type): string
    {
        $model = '';
        switch ($type) {
            case 'leads':
                $model = "\App\Models\Lead";
                break;

            case 'contacts':
                $model = "\App\Models\Contact";
                break;
            default;
        }
        return $model;
    }

    public function findByNoteAbleId($id)
    {
        return Note::where('noteable_id',$id)->with('user')->orderBy('created_at','desc')->get();
    }

}
