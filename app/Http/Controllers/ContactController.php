<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Repositories\AccountRepositoryContract;
use App\Repositories\ContactRepositoryContract;
use App\Repositories\LeadRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        abort_unless(Gate::allows('contacts_access'), 403);
        return Inertia::render('Admin/Contacts/Index',[
            'contacts' => $this->contactRepository->getContacts(request()->only('search')),
            'filters' => request()->only('search')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('contacts_process'), 403);
        return Inertia::render('Admin/Contacts/Create', [
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'account_sources' => $this->accountRepository->getAllAccounts(),
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
        abort_unless(Gate::allows('contacts_process'), 403);
        $contact = $this->contactRepository->process($request);
        return redirect()->route('admin.contacts.show', ['contact' => $contact->id])->with(['toast'=>['message' => 'Contact created!']]);
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
        abort_unless(Gate::allows('contacts_process'), 403);
        return Inertia::render('Admin/Contacts/Edit',[
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'account_sources' => $this->accountRepository->getAllAccounts(),
            'contact_data' => $this->contactRepository->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactFormRequest $request, $id)
    {
        abort_unless(Gate::allows('contacts_process'), 403);
        $this->accountRepository->findById($id);
        $contact = $this->contactRepository->process($request);
        return redirect()->route('admin.contacts.show', ['contact' => $contact->id])->with(['toast'=>['message' => 'Contact updated!']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(Gate::allows('contacts_destroy'), 403);
    }
}
