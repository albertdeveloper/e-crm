<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use App\Repositories\PermissionRepositoryContract;
use App\Repositories\RoleRepositoryContract;
use Illuminate\Http\Request;
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
        return Inertia::render('Admin/Management/User/Roles/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
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
         $this->roleRepository->process($request);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
