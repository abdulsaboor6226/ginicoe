<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerDrivingLicence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class ConsumerDrivingLicenceController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->consumersDrivingLicence_validation($request);
        $sub_tab = 'passport';
        foreach ($request->data as  $value){
            $consumersDrivingLicence = ConsumerDrivingLicence::create($value);
        }
        if (!$consumersDrivingLicence)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumersDrivingLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerDrivingLicence  $consumerDrivingLicence
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerDrivingLicence $consumerDrivingLicence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerDrivingLicence  $consumerDrivingLicence
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerDrivingLicence $consumerDrivingLicence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerDrivingLicence $consumerDrivingLicence
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
        $this->consumersDrivingLicence_validation($request);
        $sub_tab = 'passport';
        foreach ($request->data as  $value){
            if ($value['driving_licence_id_pk']== 0)
            {
                $consumersDrivingLicence = ConsumerDrivingLicence::create($value);
            }
            else{
                $consumersDrivingLicence = ConsumerDrivingLicence::findOrFail($value['driving_licence_id_pk'])->update($value);
            }
        }
        if (!$consumersDrivingLicence)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$request->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerDrivingLicence  $consumerDrivingLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerDrivingLicence $consumerDrivingLicence)
    {
        //
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function consumersDrivingLicence_validation($request): array
    {
        return $this->validate($request,[
            'data.*.driving_license_country_id_fk' => 'required',
            'data.*.driving_licensing_state' => 'required',
            'data.*.driving_license_id' => 'required',
        ]);
    }
}
