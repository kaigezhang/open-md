<?php

namespace App\Http\Controllers\Backend;

use App\Models\Baseinfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Result;
use App\Models\Patient;

class ResultsController extends Controller
{
    protected $results;

    public function __construct(Result $results)
    {
        $this->results = $results;
        parent::__construct();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Result $result)
    {
        $id = $request->get('ba');
        $patient = Baseinfo::findOrFail($id)->patient()->first();
        return view('backend.results.form', compact('result', 'id', 'patient'));
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
        $result = $this->results->create([
                'baseinfo_id' => $id,
                'blood_img' => $request->get('blood_img'),
                'blood_sugar_img' => $request->get('blood_sugar_img'),
                'liver_img' => $request->get('liver_img'),
                'sharp_teeth' => $request->get('sharp_teeth'),
                'bad_fit' => $request->get('bad_fit'),
                'calculus' => $request->get('calculus'),
                'sys_treat' => $request->get('sys_treat'),
                'sys_drug' => $request->get('sys_drug'),
                'sys_time' => $request->get('sys_time'),
                'topical_treat' => $request->get('topical_treat'),
                'topical_drug' => $request->get('topical_drug'),
                'topical_time' => $request->get('topical_time'),
                'comment' => $request->get('comment')
            ]);
        return redirect(route('backend.results.edit', $result->id))->with('status', '病人基础信息添加成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = $this->results->findOrFail($id);
        $cancers = $result->cancers()->get();
        $patient = Baseinfo::where('id', $result->baseinfo_id)->first()->patient()->first();
        return view('backend.results.form', compact('result', 'cancers', 'patient'));
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
        $result = $this->results->findOrFail($id);
        $result->fill($request->all())->save();
        return redirect(route('backend.results.edit', compact('result')));
    }

    public function confirm(Request $request, $id)
    {
        $result = $this->results->findOrFail($id);
        $patient = Baseinfo::where('id', $result->baseinfo_id)->patient()->first();

        return view('backend.results.confirm', compact('result', 'patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->results->findOrFail($id);
        $patient = Patient::where('id', $result->patient_id)->first();
        $result->delete();
        return redirect(route('backend.patients.show', $patient->id))->with('status', '角色删除成功!');
    }
}
