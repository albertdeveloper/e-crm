<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Repositories\AccountRepositoryContract;
use App\Repositories\ContactRepositoryContract;
use App\Repositories\LeadRepositoryContract;
use App\Repositories\NoteRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class ContactController extends Controller
{
    private $leadRepository;
    private $contactRepository;
    private $accountRepository;
    private $userRepository;
    private $noteRepository;

    public function __construct(LeadRepositoryContract $leadRepositoryContract,
                                ContactRepositoryContract $contactRepositoryContract,
                                AccountRepositoryContract $accountRepositoryContract,
                                UserRepositoryContract $userRepositoryContract,
                                NoteRepositoryContract  $noteRepositoryContract)
    {
        $this->leadRepository = $leadRepositoryContract;
        $this->contactRepository = $contactRepositoryContract;
        $this->accountRepository = $accountRepositoryContract;
        $this->userRepository = $userRepositoryContract;
        $this->noteRepository = $noteRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('contacts_access'), 403);
        return Inertia::render('Admin/Contacts/Index', [
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
            'lead_owners' => $this->userRepository->getLeadOwners(),
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
        return redirect()->route('admin.contacts.show', ['contact' => $contact->id])->with(['toast' => ['message' => 'Contact created!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Admin/Contacts/Show',[
            'contact' => $this->contactRepository->findByIdWithUser($id),
            'notes' => $this->noteRepository->findByNoteAbleId($id),
        ]);
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
        return Inertia::render('Admin/Contacts/Edit', [
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'account_sources' => $this->accountRepository->getAllAccounts(),
            'contact_data' => $this->contactRepository->findById($id),
            'lead_owners' => $this->userRepository->getLeadOwners(),
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
        return redirect()->route('admin.contacts.show', ['contact' => $contact->id])->with(['toast' => ['message' => 'Contact updated!']]);
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
