<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerMedicare;
use Illuminate\Http\Request;

class ConsumerMedicareController extends Controller
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
        $this->consumerMedicare_validation($request);
        $sub_tab = 'aviation';
        foreach ($request->data as  $value){
            $consumerMedicare = ConsumerMedicare::create($value);
        }
        if ($consumerMedicare)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerMedicare->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerMedicare  $consumerMedicare
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerMedicare $consumerMedicare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerMedicare  $consumerMedicare
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerMedicare $consumerMedicare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerMedicare  $consumerMedicare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerMedicare_validation($request);
        $sub_tab = 'aviation';
        foreach ($request->data as  $value){
            if ($value['medicare_id_pk']== 0)
            {
                $consumerMedicare = ConsumerMedicare::create($value);
            }
            else{
                $consumerMedicare = ConsumerMedicare::findOrFail($value['medicare_id_pk'])->update($value);
            }
        }
        if ($consumerMedicare)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerMedicare->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerMedicare  $consumerMedicare
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerMedicare $consumerMedicare)
    {
        //
    }
    public function consumerMedicare_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
