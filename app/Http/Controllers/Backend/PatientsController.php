<?php

namespace App\Http\Controllers\Backend;

use App\Models\Epibio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequests;
use App\Models\Patient;
use App\User;
use Auth;

class PatientsController extends Controller
{
    protected $patients;

    public function __construct(Patient $patients)
    {
        $this->patients = $patients;
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is('admin')){
            $patients = $this->patients->orderBy('created_at','desc')->paginate(10);
        }
        else if(Auth::user()->is('doctor')){
            $patients = $this->patients->where('user_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        }
        else $patients = [];
        return view('backend.patients.index', compact('patients', 'times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        return view('backend.patients.form', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        
        // dd(Auth::user()->id);
        // $userId= Auth::user()->id;
        // $this->patients->fill();
        $this->patients->create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'number' => $request->number,
            'gender' => $request->gender,
            'card_id' => $request->card_id,
            'case_number' => $request->case_number

            ]);
        // $this->patients->fill(['user_id' => Auth::user()->id]);


        return redirect(route('backend.patients.index'))->with('status', '病人创建成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = $this->patients->findOrFail($id);
        $baseinfos = $patient->baseinfos()->get();
//        $multi1 = $baseinfos->map(function($baseinfo, $key){
//            $epi = Epibio::where('baseinfo_id', $baseinfo->id);
//            return $epi;
//        });
//        $epibios = $multi1->all();
//        dd($epibios);
//       $time = $baseinfos->max('times');
        $epibios = $patient->epibios()->get();
        $clinicals = $patient->clincials()->get();
        $results = $patient->results()->get();
        return view('backend.patients.show', compact('patient', 'baseinfos', 'epibios', 'clinicals', 'results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = $this->patients->findOrFail($id);

        return view('backend.patients.form', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePatientRequest $request, $id)
    {
        $patient = $this->patients->findOrFail($id);
        $patient->fill($request->all())->save();
        return redirect(route('backend.patients.edit', $patient->id))->with('status', '病人信息更新成功');
    }

    public function confirm(Request $request, $id)
    {
        $patient = $this->patients->findOrFail($id);
        return view('backend.patients.confirm', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = $this->patients->findOrFail($id);
        $patient->delete();
        return redirect(route('backend.patients.index'))->with('status', '病人删除成功');
    }
}
