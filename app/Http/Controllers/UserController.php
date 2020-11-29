<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Repositories\RoleRepositoryContract;
use App\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepositoryContract $userRepositoryContract, RoleRepositoryContract $roleRepositoryContract)
    {
        $this->userRepository = $userRepositoryContract;
        $this->roleRepository = $roleRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Management/User/Users/Index', [
            'users' => $this->userRepository->getUsersExceptAdmin(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Management/User/Users/Create', [
            'roles' => $this->roleRepository->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest $request
     * @return void
     */
    public function store(UserFormRequest $request)
    {
        $this->userRepository->process($request);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Admin/Management/User/Users/Edit',[
            'user_data' => $this->userRepository->findByIdWithRole($id),
            'roles' => $this->roleRepository->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $this->userRepository->findById($id);
        $this->userRepository->process($request);
        return redirect()->route('admin.users.index');
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
