<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Olp;
use App\Models\Clinical;


class OlpsController extends Controller
{
    
    protected $olps;

    public function __construct(Olp $olps)
    {
        $this->olps = $olps;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Olp $olp)
    {
        $id = $request->get('cl');

        return view('backend.olps.form', compact('olp', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clinicalId = $request->get('id');
        $this->olps->create([
            'clinical_id' => $clinicalId,
            'site' => $request->get('site'),
            'bw' => $request->get('bw'),
            'cx' => $request->get('cx'),
            'ml_long' => $request->get('ml_long'),
            'ml_wide' => $request->get('ml_wide'),
            'site_img' => $request->get('site_img'),
            'cancer' => $request->get('cancer')
            ]);
        return redirect(route('backend.clinicals.edit', $clinicalId));
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
        $olp = $this->olps->findOrFail($id);
        return view('backend.olps.form', compact('olp'));
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
        $olp = $this->olps->findOrFail($id);
        $clinical = Clinical::where('id', $olp->clinical_id)->first();
        $olp->fill($request->all())->save();

        return redirect(route('backend.clinicals.edit', $clinical->id))->with('status', 'OLP病患信息更新成功');
    }



    public function confirm(Request $request, $id)
    {
        $olp = $this->olps->findOrFail($id);
        $clinical = Clinical::where('id', $olp->clinical_id)->first();

        return view('backend.olps.confirm', compact('olp', 'clinical'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $olp = $this->olps->findOrFail($id);
        $clinical = Clinical::where('id', $olp->clinical_id)->first();
        $olp->delete();

        return redirect(route('backend.clinicals.edit', compact('clinical')))->with('status', 'OLP病患信息删除成功');
    }
}
