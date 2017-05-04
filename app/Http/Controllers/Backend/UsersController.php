<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Bican\Roles\Models\Role;

class UsersController extends Controller
{
    protected $users;


    public function __construct(User $users)
    {
        $this->users = $users;
        $this->middleware('role:admin | doctor');
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->paginate(10);

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $roles = Role::all();
        return view('backend.users.form', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreUserRequest $request)
    {

        $this->users->create($request->only('name', 'email', 'password'))->attachRole($request->roles);
        // $this->users->attachRole($request->roles);

        return redirect(route('backend.users.index'))->with('status', '用户创建成功');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->users->findOrFail($id);
        if($user->is('admin')){
            $roles = Role::all();
        } else {
            $roles = $user->roles()->get();
        }

        return view('backend.users.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        $user->detachAllRoles();
        $user->fill($request->only('name', 'email', 'password'))->save();
        $user->attachRole($request->roles);

        return redirect(route('backend.users.edit', $user->id))->with('status', '用户更新成功');
    }

    public function confirm(Requests\DeleteUserRequest $request, $id)
    {
        # code...
        $user = $this->users->findOrFail($id);
        return view('backend.users.confirm', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\DeleteUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        $user->detachAllRoles();
        $user->delete();
        return redirect(route('backend.users.index'))->with('status', 'User delete success!');
    }
}
