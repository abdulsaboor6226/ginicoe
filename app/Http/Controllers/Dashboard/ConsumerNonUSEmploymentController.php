<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerNonUSEmployment;
use Illuminate\Http\Request;

class ConsumerNonUSEmploymentController extends Controller
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
        $this->consumerNonUSEmployment_validation($request);
        foreach ($request->data as  $value){
            $consumerNonUSEmployment = ConsumerNonUSEmployment::create($value);
        }
        if ($consumerNonUSEmployment)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerNonUSEmployment->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$request->sub_tab])->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerNonUSEmployment  $consumerNonUSEmployment
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerNonUSEmployment $consumerNonUSEmployment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerNonUSEmployment  $consumerNonUSEmployment
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerNonUSEmployment $consumerNonUSEmployment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerNonUSEmployment  $consumerNonUSEmployment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerNonUSEmployment_validation($request);
        foreach ($request->data as  $value){
            if ($value['consumerNonUSEmployment_id_pk']== 0)
            {
                $consumerNonUSEmployment = ConsumerNonUSEmployment::create($value);
            }
            else{
                $consumerNonUSEmployment = ConsumerNonUSEmployment::findOrFail($value['consumerNonUSEmployment_id_pk'])->update($value);
            }
        }
        if ($consumerNonUSEmployment)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerNonUSEmployment->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$request->sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerNonUSEmployment  $consumerNonUSEmployment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerNonUSEmployment $consumerNonUSEmployment)
    {
        //
    }
    public function consumerNonUSEmployment_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
