<?php

namespace App\Http\Controllers\Backend;

use App\Models\Baseinfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Clinical;
use App\Models\Patient;

class ClinicalsController extends Controller
{
    protected $clinicals;

    public function __construct(Clinical $clinicals)
    {
        $this->clinicals = $clinicals;
        parent::__construct();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Clinical $clinical)
    {
        $id = $request->get('ba');
        $patient = Baseinfo::findOrFail($id)->patient()->first();

//        dd($patient);
        $area = 0;
        return view('backend.clinicals.form', compact('clinical', 'id', 'area', 'patient'));
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
       	$clinical =  $this->clinicals->create([
                'baseinfo_id' => $id,
                'diagnosis' => $request->get('diagnosis'),
                'd_course' => $request->get('d_course'),
                'symptom' => $request->get('symptom'),
                'ml_area' => 0,
                'olp_type' => '',
            ]);
        // $patient = Baseinfo::findOrFail($id)->patient()->first();
        return redirect(route('backend.clinicals.edit', $clinical->id))->with('status', '病人基础信息添加成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinical = $this->clinicals->findOrFail($id);
        $olps = $clinical->olps()->get();
        $olks = $clinical->olks()->get();
        $area = $clinical->ml_area;
        foreach ($olps as $olp) {
            $area += $olp->ml_wide * $olp->ml_long;
        }
        $patient = Baseinfo::where('id', $clinical->baseinfo_id)->first()->patient()->first();
        return view('backend.clinicals.form', compact('clinical', 'olps', 'olks', 'area', 'patient'));
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
        $clinical = $this->clinicals->findOrFail($id);
        $clinical->fill($request->all())->save();
        return redirect(route('backend.clinicals.edit', $clinical->id))->with('status', '病人基础信息更新成功');
    }

    public function confirm(Request $request, $id)
    {
        $clinical = $this->clinicals->findOrFail($id);
        $patient = Baseinfo::where('id', $clinical->baseinfo_id)->patient()->first();

        return view('backend.clinicals.confirm', compact('clinical', 'patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinical = $this->clinicals->findOrFail($id);
        $patient = Patient::where('id', $clinical->patient_id)->first();
        $clinical->delete();
        return redirect(route('backend.patients.show', $patient->id))->with('status', '病人基础信息删除成功');
    }
}
