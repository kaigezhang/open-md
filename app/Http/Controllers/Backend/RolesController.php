<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use Bican\Roles\Models\Role;

class RolesController extends Controller
{
    
    protected $roles;


    public function __construct(Role $roles)
    {
        $this->roles = $roles;

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roles->all();

        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        return view('backend.roles.form', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->roles->create($request->all());
        return redirect(route('backend.roles.index'))->with('status', '角色创建成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roles->findOrFail($id);

        return view('backend.roles.form', compact('role'));
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
        $role = $this->roles->findOrFail($id);
        $role->fill($request->all())->save();

        return redirect(route('backend.roles.edit'))->with('status', '角色更新成功');
    }


    public function confirm(Request $request, $id)
    {
        $role = $this->roles->findOrFail($id);

        return view('backend.roles.confirm', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->roles->findOrFail($id);
        $role->delete();
        return redirect(route('backend.roles.index'))->with('status', '角色删除成功!');
    }
}
