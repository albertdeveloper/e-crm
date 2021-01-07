<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadFormRequest;
use App\Repositories\AccountRepositoryContract;
use App\Repositories\ContactRepositoryContract;
use App\Repositories\LeadRepositoryContract;
use App\Repositories\NoteRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class LeadController extends Controller
{
    private $leadRepository;
    private $userRepository;
    private $noteRepository;
    private $accountRepository;
    private $contactRepository;

    public function __construct(LeadRepositoryContract $leadRepositoryContract,UserRepositoryContract $userRepositoryContract, NoteRepositoryContract $noteRepositoryContract, AccountRepositoryContract $accountRepositoryContract, ContactRepositoryContract $contactRepositoryContract)
    {
        $this->leadRepository = $leadRepositoryContract;
        $this->userRepository = $userRepositoryContract;
        $this->noteRepository = $noteRepositoryContract;
        $this->accountRepository = $accountRepositoryContract;
        $this->contactRepository = $contactRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('leads_access'), 403);
        return Inertia::render('Admin/Leads/Index',[
            'leads' => $this->leadRepository->getLeads(request()->only('search')),
            'filters' => request()->only('search'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('leads_process'), 403);
        return Inertia::render('Admin/Leads/Create', [
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'lead_status' => $this->leadRepository->getAllLeadStatus(),
            'lead_owners' => $this->userRepository->getLeadOwners(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadFormRequest $request)
    {
        abort_unless(Gate::allows('leads_process'), 403);
        $lead = $this->leadRepository->process($request);
        return redirect()->route('admin.leads.show',['lead' => $lead->id])->with(['toast' => ['message' => 'Lead created!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_unless(Gate::allows('leads_show'), 403);

        $lead =  $this->leadRepository->findByIdWithUser($id);

        return Inertia::render('Admin/Leads/Show',[
            'lead_data' => $lead,
            'notes' => $this->noteRepository->findByNoteAbleId($id),
            'lead_logo' => $lead->defaultProfilePicture(),
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
        abort_unless(Gate::allows('leads_process'), 403);
        return Inertia::render('Admin/Leads/Edit', [
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'lead_status' => $this->leadRepository->getAllLeadStatus(),
            'lead_data' => $this->leadRepository->findById($id),
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
    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('leads_process'), 403);
        $lead = $this->leadRepository->process($request);
        return redirect()->route('admin.leads.show',['lead' => $lead->id])->with(['toast' => ['message' => 'Lead updated!']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(Gate::allows('leads_destroy'), 403);
    }

    public function convert_lead($id)
    {
        $lead_data =  $this->leadRepository->findById($id);
        return Inertia::render('Admin/Leads/Convert',[
            'lead_data' => $lead_data,
            'existing_account' => $this->accountRepository->findByName($lead_data),
            'existing_contact' => $this->contactRepository->findByName($lead_data),
        ]);
    }

    public function convert_lead_store($id): \Illuminate\Http\RedirectResponse
    {
        $this->leadRepository->process_convert($id);
        return redirect()->route('admin.leads.index')->with(['toast' => ['message' => 'Convert successfully']]);
    }
}
