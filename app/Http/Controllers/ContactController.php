<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Repositories\AccountRepositoryContract;
use App\Repositories\ContactRepositoryContract;
use App\Repositories\LeadRepositoryContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    private $leadRepository;
    private $contactRepository;
    private $accountRepository;

    public function __construct(LeadRepositoryContract $leadRepositoryContract,
                                ContactRepositoryContract $contactRepositoryContract,
                                AccountRepositoryContract $accountRepositoryContract)
    {
        $this->leadRepository = $leadRepositoryContract;
        $this->contactRepository = $contactRepositoryContract;
        $this->accountRepository = $accountRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Contacts/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Contacts/Create', [
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'account_sources' => $this->accountRepository->getAccounts(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $contact = $this->contactRepository->process($request);
        return redirect()->route('admin.contacts.show', ['contact' => $contact->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Admin/Contacts/Show');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
