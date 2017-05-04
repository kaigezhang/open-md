<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use Bican\Roles\Models\Permission;

class PermsController extends Controller
{
    
    protected $perms;


    public function __construct(Permission $perms)
    {
        $this->perms = $perms;

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perms = $this->perms->all();

        return view('backend.perms.index', compact('perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Permission $perm)
    {
        return view('backend.perms.form', compact('perm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->perms->create($request->all());
        return redirect(route('backend.perms.index'))->with('status', '角色创建成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perm = $this->perms->findOrFail($id);

        return view('backend.perms.form', compact('perm'));
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
        $perm = $this->perms->findOrFail($id);
        $perm->fill($request->all())->save();

        return redirect(route('backend.perms.edit', compact('perms')))->with('status', '角色更新成功');
    }


    public function confirm(Request $request, $id)
    {
        $perm = $this->perms->findOrFail($id);

        return view('backend.perms.confirm', compact('perm'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perm = $this->perms->findOrFail($id);
        $perm->delete();
        return redirect(route('backend.perms.index'))->with('status', '角色删除成功!');
    }
}
