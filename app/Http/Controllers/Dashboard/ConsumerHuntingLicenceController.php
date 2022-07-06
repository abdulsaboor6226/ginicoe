<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerHuntingLicence;
use Illuminate\Http\Request;

class ConsumerHuntingLicenceController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->consumerHuntingLicence_validation($request);
        $sub_tab = 'fishing';
        foreach ($request->data as  $value){
            $consumerHuntingLicence = ConsumerHuntingLicence::create($value);
        }
        if ($consumerHuntingLicence)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerHuntingLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerHuntingLicence  $consumerHuntingLicence
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerHuntingLicence $consumerHuntingLicence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerHuntingLicence  $consumerHuntingLicence
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerHuntingLicence $consumerHuntingLicence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerHuntingLicence  $consumerHuntingLicence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerHuntingLicence_validation($request);
        $sub_tab = 'fishing';
        foreach ($request->data as  $value){
            if ($value['hunting_licence_id_pk']== 0)
            {
                $consumerHuntingLicence = ConsumerHuntingLicence::create($value);
            }
            else{
                $consumerHuntingLicence = ConsumerHuntingLicence::findOrFail($value['hunting_licence_id_pk'])->update($value);
            }
        }
        if ($consumerHuntingLicence)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerHuntingLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerHuntingLicence  $consumerHuntingLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerHuntingLicence $consumerHuntingLicence)
    {
        //
    }
    public function consumerHuntingLicence_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
