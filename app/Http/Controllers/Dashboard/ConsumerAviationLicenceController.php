<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerAviationLicence;
use Illuminate\Http\Request;

class ConsumerAviationLicenceController extends Controller
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
        $this->consumerAviationLicence_validation($request);
        $sub_tab = 'fire_arms';
        foreach ($request->data as  $value){
            $consumerAviationLicence = ConsumerAviationLicence::create($value);
        }
        if ($consumerAviationLicence)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerAviationLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerAviationLicence  $consumerAviationLicence
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerAviationLicence $consumerAviationLicence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerAviationLicence  $consumerAviationLicence
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerAviationLicence $consumerAviationLicence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerAviationLicence  $consumerAviationLicence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerAviationLicence_validation($request);
        $sub_tab = 'fire_arms';
        foreach ($request->data as  $value){
            if ($value['aviation_id_pk']== 0)
            {
                $consumerAviationLicence = ConsumerAviationLicence::create($value);
            }
            else{
                $consumerAviationLicence = ConsumerAviationLicence::findOrFail($value['aviation_id_pk'])->update($value);
            }
        }
        if ($consumerAviationLicence)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerAviationLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerAviationLicence  $consumerAviationLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consumerAviationLicence = ConsumerAviationLicence::findOrFail($id);
        $consumerAviationLicenceDel= $consumerAviationLicence->delete();
        $main_tab = 'multi_values_form_data';
        $sub_tab = 'aviation';
        if (!$consumerAviationLicenceDel)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerAviationLicence->consumer_id_fk, 'main_tab'=> $main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Deleted");
        }
    }
    public function consumerAviationLicence_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
