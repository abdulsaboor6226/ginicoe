<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerPassport;
use Illuminate\Http\Request;

class ConsumerPassportController extends Controller
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
        $this->consumerPassport_validation($request);
        $sub_tab = 'twins';
        foreach ($request->data as  $value){
            $consumerPassport = ConsumerPassport::create($value);
        }
        if ($consumerPassport)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerPassport->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerPassport  $consumerPassport
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerPassport $consumerPassport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerPassport  $consumerPassport
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerPassport $consumerPassport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerPassport  $consumerPassport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerPassport_validation($request);
        $sub_tab = 'twins';
        foreach ($request->data as  $value){
            if ($value['passport_id_pk']== 0)
            {
                $consumerPassport = ConsumerPassport::create($value);
            }
            else{
                $consumerPassport = ConsumerPassport::findOrFail($value['passport_id_pk'])->update($value);
            }
        }
        if ($consumerPassport)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerPassport->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerPassport  $consumerPassport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerPassport $consumerPassport)
    {
        //
    }
    public function consumerPassport_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
