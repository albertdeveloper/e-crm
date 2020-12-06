<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFormRequest;
use App\Repositories\PermissionRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class PermissionController extends Controller
{

    private $permissionRepository;

    public function __construct(PermissionRepositoryContract $permissionRepositoryContract)
    {
        $this->permissionRepository = $permissionRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('permissions_access'), 403);
        return Inertia::render('Admin/Management/User/Permissions/Index',[
            'permissions' => $this->permissionRepository->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('permissions_process'), 403);
        return Inertia::render('Admin/Management/User/Permissions/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionFormRequest $request)
    {
        abort_unless(Gate::allows('permissions_process'), 403);
        $this->permissionRepository->process($request);
        return redirect()->route('admin.permissions.index')->with(['toast'=>['message' => 'Permission created!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Gate::allows('permissions_process'), 403);
        return Inertia::render('Admin/Management/User/Permissions/Edit',[
            'permission' => $this->permissionRepository->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionFormRequest $request, $id)
    {
        abort_unless(Gate::allows('permissions_process'), 403);
        $this->permissionRepository->findById($id);
        $this->permissionRepository->process($request);
        return redirect()->route('admin.permissions.index')->with(['toast'=>['message' => 'Permission updated!']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(Gate::allows('permissions_destroy'), 403);
        //
    }
}
