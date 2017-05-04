<?php

namespace App\Http\Controllers\Backend;

use App\Models\Baseinfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Epibio;

class EpibiosController extends Controller
{
    protected $epibios;

    public function __construct(Epibio $epibios)
    {
        $this->epibios = $epibios;
        parent::__construct();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Epibio $epibio)
    {
        $id = $request->get('ba');
        $patient = Baseinfo::findOrFail($id)->patient()->first();
        return view('backend.epibios.form', compact('epibio', 'id', 'patient'));
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
        $this->epibios->create([
                'baseinfo_id' => $id,
                'smoke' => $request->get('smoke'),
                'smo_age' => $request->get('smo_age'),
                'quit_smoking' => $request->get('quit_smoking'),
                'smo_num' => $request->get('smo_num'),
                'smo_type' => $request->get('smo_type'),
                'smo_quit_time' => $request->get('smo_quit_time'),
                'passive_smo' => $request->get('passive_smo'),
                'smo_comments' => $request->get('smo_comments'),
                'drink' => $request->get('drink'),
                'dri_age' => $request->get('dri_age'),
                'quit_dri' => $request->get('quit_dri'),
                'capacity' => $request->get('capacity'),
                'dri_type' => $request->get('dri_type'),
                'dri_quit_time' => $request->get('dri_quit_time'),
                'dri_comments' => $request->get('dri_comments'),
                'tabacoo' => $request->get('tabacoo'),
                'tabacoo_dos' => $request->get('tabacoo_dos'),
                'betel' => $request->get('betel'),
                'betel_dos' => $request->get('betel_dos'),
                'food' => $request->get('food'),
                'sys_d' => $request->get('sys_d'),
                'sys_d_details' => $request->get('sys_d_details'),
                'fami_d' => $request->get('fami_d'),
                'fami_d_details' => $request->get('fami_d_details'),
                'drug' => $request->get('drug'),
                'drug_details' => $request->get('drug_details')
            ]);
        $patient = Baseinfo::findOrFail($id)->patient()->first();
        return redirect(route('backend.patients.show', $patient->id))->with('status', '病人基础信息添加成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $epibio = $this->epibios->findOrFail($id);
        $patient = Baseinfo::where('id', $epibio->baseinfo_id)->first()->patient()->first();
        return view('backend.epibios.form', compact('epibio', 'patient'));
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
        $epibio = $this->epibios->findOrFail($id);
        $epibio->fill($request->all())->save();
        return redirect(route('backend.epibios.edit', $epibio->id))->with('status', '病人基础信息更新成功');
    }

    public function confirm(Request $request, $id)
    {
        $epibio = $this->epibios->findOrFail($id);
        $baseinfo = Baseinfo::where('id', $epibio->baseinfo_id)->first();
        $patient = $baseinfo->patient()->first();

        return view('backend.epibios.confirm', compact('epibio', 'baseinfo', 'patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $epibio = $this->epibios->findOrFail($id);
        $patient = Baseinfo::where('id', $epibio->baseinfo_id)->patient()->first();
        $epibio->delete();
        return redirect(route('backend.patients.show', compact('patient')))->with('status', '病人基础信息删除成功');
    }
}
