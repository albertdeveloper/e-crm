<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteFormRequest;
use App\Repositories\NoteRepositoryContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{

    private $noteRepository;

    public function __construct(NoteRepositoryContract $noteRepositoryContract)
    {
        $this->noteRepository = $noteRepositoryContract;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteFormRequest $request)
    {
        $idType = $this->noteRepository->process($request);
        return redirect()->route('admin.' . $request->type . '.show', [$idType => $request->passId]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
}
?>

