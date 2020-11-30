<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadFormRequest;
use App\Repositories\LeadRepositoryContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    private $leadRepository;

    public function __construct(LeadRepositoryContract $leadRepositoryContract)
    {
        $this->leadRepository = $leadRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('Admin/Leads/Index',[
            'leads' => $this->leadRepository->getLeads(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Leads/Create', [
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'lead_status' => $this->leadRepository->getAllLeadStatus(),
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
        $lead = $this->leadRepository->process($request);
        return redirect()->route('admin.leads.show',['lead' => $lead->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead =  $this->leadRepository->    findById($id);
        return Inertia::render('Admin/Leads/Show',[
            'lead_data' => $lead,
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
        return Inertia::render('Admin/Leads/Edit', [
            'lead_sources' => $this->leadRepository->getAllLeadSource(),
            'lead_status' => $this->leadRepository->getAllLeadStatus(),
            'lead_data' => $this->leadRepository->findById($id),
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
