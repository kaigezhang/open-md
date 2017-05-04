<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Baseinfo;
use Route;
use App\Models\Patient;

class BaseinfosController extends Controller
{
    
    protected $baseinfos;

    public function __construct(Baseinfo $baseinfos)
    {
        $this->baseinfos = $baseinfos;
        parent::__construct();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Baseinfo $baseinfo)
    {
        $id = $request->get('patient');

        $patient = Patient::findOrFail($id);
        return view('backend.baseinfos.form', compact('baseinfo', 'id', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id');
        $time = $this->baseinfos->where('patient_id', $id)->max('times');
        if(!$time)
            $time = 0;
        $this->baseinfos->create([
                'patient_id' => $id,
                'times' => $time + 1,
                'recorder' => $request->get('recorder'),
                'bingli' => $request->get('bingli'),
                'mphone' => $request->get('mphone'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'address' => $request->get('address'),
                'qq' => $request->get('qq'),
                'weixin' => $request->get('weixin'),
                'job_status' => $request->get('job_status'),
                'job' => $request->get('job'),
                'education' => $request->get('education'),
                'living' => $request->get('living'),
                'living_status' => $request->get('living_status')
            ]);
        $patient = Patient::findOrFail($id);
        return redirect(route('backend.patients.show', compact('patient')))->with('status', '病人基础信息添加成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baseinfo = $this->baseinfos->findOrFail($id);
        $patient = $baseinfo->patient()->first();
        return view('backend.baseinfos.form', compact('baseinfo', 'patient'));
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
        $baseinfo = $this->baseinfos->findOrFail($id);
        $baseinfo->fill($request->all())->save();
        return redirect(route('backend.baseinfos.edit', $baseinfo->id))->with('status', '病人基础信息更新成功');
    }

    public function confirm(Request $request, $id)
    {
        $baseinfo = $this->baseinfos->findOrFail($id);
        $patient = Patient::where('id', $baseinfo->patient_id)->first();   
        return view('backend.baseinfos.confirm', compact('baseinfo', 'patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baseinfo = $this->baseinfos->findOrFail($id);
        $patient = Patient::where('id', $baseinfo->patient_id)->first();   
        $baseinfo->delete();
        return redirect(route('backend.patients.show', compact('patient')))->with('status', '病人基础信息删除成功');
    }
}
