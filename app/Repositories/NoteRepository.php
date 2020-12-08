<?php

namespace App\Repositories;


class NoteRepository implements NoteRepositoryContract
{
    public function process($request)
    {
        $model = $this->defineModel($request->type);

        $data = $model::findOrFail($request->passId);

        $data->note()->create([
            'title' => $request->title,
            'note' => $request->note,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
        ]);

        return str_replace('s','',$request->type);

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

}
