<?php
namespace App\Repositories;



class NoteRepository implements NoteRepositoryContract
{
    public function process($request)
    {
         $data = $request->model::find($request->passId);

        $data->note()->create([
            'title' => $request->title,
            'note' => $request->note,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
        ]);
    }
}
