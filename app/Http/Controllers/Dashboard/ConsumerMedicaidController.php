<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerMedicaid;
use Illuminate\Http\Request;

class ConsumerMedicaidController extends Controller
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
        $this->consumerMedicaid_validation($request);
        $sub_tab = 'medicares';
        foreach ($request->data as  $value){
            $consumerMedicaid = ConsumerMedicaid::create($value);
        }
        if ($consumerMedicaid)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerMedicaid->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerMedicaid  $consumerMedicaid
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerMedicaid $consumerMedicaid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerMedicaid  $consumerMedicaid
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerMedicaid $consumerMedicaid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerMedicaid  $consumerMedicaid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerMedicaid_validation($request);
        $sub_tab = 'medicares';
        foreach ($request->data as  $value){
            if ($value['medicaid_id_pk']== 0)
            {
                $consumerMedicaid = ConsumerMedicaid::create($value);
            }
            else{
                $consumerMedicaid = ConsumerMedicaid::findOrFail($value['medicaid_id_pk'])->update($value);
            }
        }
        if ($consumerMedicaid)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerMedicaid->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerMedicaid  $consumerMedicaid
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerMedicaid $consumerMedicaid)
    {
        //
    }
    public function consumerMedicaid_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
