<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountFormRequest;
use App\Repositories\AccountRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class AccountController extends Controller
{
    private $accountRepository;

    public function __construct(AccountRepositoryContract $accountRepositoryContract)
    {
        $this->accountRepository = $accountRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        abort_unless(Gate::allows('accounts_access'), 403);
        return Inertia::render('Admin/Accounts/Index',[
            'accounts' => $this->accountRepository->getAllAccounts(),
            'filters' => request()->only('search'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        abort_unless(Gate::allows('accounts_process'), 403);
        return Inertia::render('Admin/Accounts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(AccountFormRequest $request)
    {
        abort_unless(Gate::allows('accounts_process'), 403);
        $this->accountRepository->process($request);
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        abort_unless(Gate::allows('accounts_show'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        abort_unless(Gate::allows('accounts_process'), 403);
        return Inertia::render('Admin/Accounts/Edit',[
            'account_data' => $this->accountRepository->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('accounts_process'), 403);
        $this->accountRepository->process($request);
        return redirect()->route('admin.accounts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        abort_unless(Gate::allows('accounts_destroy'), 403);
    }
}
