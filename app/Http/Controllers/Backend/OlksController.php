<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Olk;
use App\Models\Clinical;

class OlksController extends Controller
{
    protected $olks;

    public function __construct(Olk $olks)
    {
        $this->olks = $olks;
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
    public function create(Request $request, Olk $olk)
    {
        $id = $request->get('cl');

        return view('backend.olks.form', compact('olk', 'id'));
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
        $this->olks->create([
            'clinical_id' => $clinicalId,
            'site' => $request->get('site'),
            'site_long' => $request->get('site_long'),
            'site_wide' => $request->get('site_wide'),
            'type' => $request->get('type'),
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
        $olk = $this->olks->findOrFail($id);
        return view('backend.olks.form', compact('olk'));
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
        $olk = $this->olks->findOrFail($id);
        $clinical = Clinical::where('id', $olk->clinical_id)->first();
        $olk->fill($request->all())->save();

        return redirect(route('backend.clinicals.edit', $clinical->id))->with('status', 'OLKS病患信息更新成功');
    }

    public function confirm(Request $request, $id)
    {
        $olk = $this->olks->findOrFail($id);
        $clinical = Clinical::where('id', $olk->clinical_id)->first();

        return view('backend.olks.confirm', compact('olk', 'clinical'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $olk = $this->olks->findOrFail($id);
        $clinical = Clinical::where('id', $olk->clinical_id)->first();
        $olk->delete();

        return redirect(route('backend.clinicals.edit', compact('clinical')))->with('status', 'OLKS病患信息删除成功');
    }
}
