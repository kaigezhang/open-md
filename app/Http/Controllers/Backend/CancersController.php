<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Cancer;
use App\Models\Result;

class CancersController extends Controller
{
    protected $cancers;

    public function __construct(Cancer $cancers)
    {
        $this->cancers = $cancers;
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
    public function create(Request $request, Cancer $cancer)
    {
        $id = $request->get('re');
        return view('backend.cancers.form', compact('cancer', 'id'));
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
//        dd($id);
        $this->cancers->create([
            'result_id' => $id,
            'part' => $request->get('part'),
            'velscope' => $request->get('velscope'),
            'velscope_img' => $request->get('velscope_img'),
            'toluidine' => $request->get('toluidine'),
            'toluidine_img' => $request->get('toluidine_img'),
            'biospy' => $request->get('biospy'),
            'biospy_img' => $request->get('biospy_img')
            ]);
        return redirect(route('backend.results.edit', $id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cancer = $this->cancers->findOrFail($id);
        return view('backend.cancers.form', compact('cancer'));
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
        $cancer = $this->cancers->findOrFail($id);
        $result = Result::where('id', $cancer->result_id)->first();
        $cancer->fill($request->all())->save();

        return redirect(route('backend.results.edit', $result->id))->with('status', '癌变病患信息更新成功');
    }

    public function confirm(Request $request, $id)
    {
        $cancer = $this->cancers->findOrFail($id);
        $result = Result::where('id', $cancer->result_id)->first();
        return view('backend.cancers.confirm', compact('cancer', 'result'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cancer = $this->cancers->findOrFail($id);
        $result = Result::where('id', $cancer->result_id)->first();
        $cancer->delete();

        return redirect(route('backend.results.edit', compact('result')))->with('status', '癌变病患信息删除成功');
    }
}
