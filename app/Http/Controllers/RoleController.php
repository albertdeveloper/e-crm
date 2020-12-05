<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class RoleController extends Controller
{
    private $permissionRepository;
    private $roleRepository;

    public function __construct(PermissionRepositoryContract $permissionRepositoryContract,RoleRepositoryContract $roleRepositoryContract)
    {
        $this->permissionRepository = $permissionRepositoryContract;
        $this->roleRepository = $roleRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('roles_access'), 403);
        return Inertia::render('Admin/Management/User/Roles/Index',[
            'roles' => $this->roleRepository->allWithPermissions(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('roles_process'), 403);
        return Inertia::render('Admin/Management/User/Roles/Create',[
            'permissions' => $this->permissionRepository->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleFormRequest $request
     * @return void
     */
    public function store(RoleFormRequest $request)
    {
        abort_unless(Gate::allows('roles_process'), 403);
         $this->roleRepository->process($request);
         return redirect()->route('admin.roles.index');
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
        abort_unless(Gate::allows('roles_process'), 403);
        $role =  $this->roleRepository->findById($id);

        return Inertia::render('Admin/Management/User/Roles/Edit.vue',[
            'role' => $role,
            'attach_permission' => $role->permissions,
            'permissions' => $this->permissionRepository->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort_unless(Gate::allows('roles_process'), 403);
        $this->roleRepository->findById($id);
        $this->roleRepository->process($request);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(Gate::allows('users_destroy'), 403);
    }
}
