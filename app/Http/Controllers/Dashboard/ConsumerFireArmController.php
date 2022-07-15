<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerFireArm;
use Illuminate\Http\Request;

class ConsumerFireArmController extends Controller
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->consumerFireArm_validation($request);
        $sub_tab = 'non_US_employment';
        foreach ($request->data as  $value){
            $consumerFireArm = ConsumerFireArm::create($value);
        }
        if (!$consumerFireArm)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerFireArm->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerFireArm  $consumerFireArm
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerFireArm $consumerFireArm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerFireArm  $consumerFireArm
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerFireArm $consumerFireArm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerFireArm $consumerFireArm
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
        $this->consumerFireArm_validation($request);
        $sub_tab = 'non_US_employment';
        foreach ($request->data as  $value){
            if ($value['fire_arms_id_pk']== 0)
            {
                $consumerFireArm = ConsumerFireArm::create($value);
            }
            else{
                $consumerFireArm = ConsumerFireArm::findOrFail($value['fire_arms_id_pk'])->update($value);
            }
        }
        if (!$consumerFireArm)
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
     * @param  \App\Models\ConsumerFireArm  $consumerFireArm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerFireArm $consumerFireArm)
    {
        //
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function consumerFireArm_validation($request): array
    {
        return $this->validate($request,[
            'data.*.fire_arm_country_id_fk' => 'required',
            'data.*.fire_arm_state' => 'required',
            'data.*.fire_arm_id' => 'required',
        ]);
    }
}
