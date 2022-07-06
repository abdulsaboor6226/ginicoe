<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerFishingLicence;
use Illuminate\Http\Request;

class ConsumerFishingLicenceController extends Controller
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
        $this->consumerFishingLicence_validation($request);
        $sub_tab = 'medicaids';
        foreach ($request->data as  $value){
            $consumerFishingLicence = ConsumerFishingLicence::create($value);
        }
        if ($consumerFishingLicence)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerFishingLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record save");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerFishingLicence  $consumerFishingLicence
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerFishingLicence $consumerFishingLicence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerFishingLicence  $consumerFishingLicence
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerFishingLicence $consumerFishingLicence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerFishingLicence  $consumerFishingLicence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerFishingLicence_validation($request);
        $sub_tab = 'medicaids';
        foreach ($request->data as  $value){
            if ($value['fishing_licence_id_pk']== 0)
            {
                $consumerFishingLicence = ConsumerFishingLicence::create($value);
            }
            else{
                $consumerFishingLicence = ConsumerFishingLicence::findOrFail($value['fishing_licence_id_pk'])->update($value);
            }
        }
        if ($consumerFishingLicence)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerFishingLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerFishingLicence  $consumerFishingLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerFishingLicence $consumerFishingLicence)
    {
        //
    }
    public function consumerFishingLicence_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
