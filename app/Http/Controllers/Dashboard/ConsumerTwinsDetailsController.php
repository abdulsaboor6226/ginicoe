<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerTwinsDetail;
use App\Models\ConsumerTwinsDetails;
use Illuminate\Http\Request;

class ConsumerTwinsDetailsController extends Controller
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
        $this->consumerTwinsDetail_validation($request);
        $sub_tab = 'hunting';
        foreach ($request->data as  $value){
            $consumerTwinsDetail = ConsumerTwinsDetail::create($value);
        }
        if ($consumerTwinsDetail)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerTwinsDetail->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record save");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerTwinsDetails  $consumerTwinsDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerTwinsDetails $consumerTwinsDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerTwinsDetails  $consumerTwinsDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerTwinsDetails $consumerTwinsDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerTwinsDetails  $consumerTwinsDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->consumerTwinsDetail_validation($request);
        $sub_tab= 'hunting';
        foreach ($request->data as  $value){
            if ($value['twins_detail_id_pk']== 0)
            {
                $consumerTwinsDetail = ConsumerTwinsDetail::create($value);
            }
            else{
                $consumerTwinsDetail = ConsumerTwinsDetail::findOrFail($value['twins_detail_id_pk'])->update($value);
            }
        }
        if ($consumerTwinsDetail)
        {
            return redirect()->route('consumers.edit',['id' =>$consumerTwinsDetail->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerTwinsDetails  $consumerTwinsDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerTwinsDetails $consumerTwinsDetails)
    {
        //
    }
    public function consumerTwinsDetail_validation($request){
        return $this->validate($request,[
            'fire_arm_country_id_fk'=> 'data.*.fire_arm_country_id_fk',
            'fire_arm_state'=> 'data.*.fire_arm_state',
            'fire_arm_id'=> 'data.*.fire_arm_id',
        ]);
    }
}
