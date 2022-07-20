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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->consumerHuntingLicence_validation($request);
        $sub_tab = 'fishing';
        foreach ($request->data as  $value){
            $consumerHuntingLicence = ConsumerHuntingLicence::create($value);
        }
        if (!$consumerHuntingLicence)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerHuntingLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerHuntingLicence $consumerHuntingLicence
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
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
        if (!$consumerHuntingLicence)
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
     * @param  \App\Models\ConsumerHuntingLicence  $consumerHuntingLicence
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $consumerHuntingLicence = ConsumerHuntingLicence::findOrFail($id);
        $consumerHuntingLicenceDel= $consumerHuntingLicence->delete();
        $main_tab = 'multi_values_form_data';
        $sub_tab = 'Hunting_licence';
        if (!$consumerHuntingLicenceDel)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerHuntingLicence->consumer_id_fk, 'main_tab'=> $main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Deleted");
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function consumerHuntingLicence_validation($request): array
    {
        return $this->validate($request,[
            'data.*.hunting_country_id_fk' => 'required',
            'data.*.hunting_state' => 'required',
            'data.*.hunting_license_id' => 'required',
        ]);
    }
}
