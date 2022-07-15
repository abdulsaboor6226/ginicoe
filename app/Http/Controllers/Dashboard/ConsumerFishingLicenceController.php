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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->consumerFishingLicence_validation($request);
        $sub_tab = 'medicaids';
        foreach ($request->data as  $value){
            $consumerFishingLicence = ConsumerFishingLicence::create($value);
        }
        if (!$consumerFishingLicence)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerFishingLicence->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerFishingLicence $consumerFishingLicence
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
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
        if (!$consumerFishingLicence)
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
     * @param  \App\Models\ConsumerFishingLicence  $consumerFishingLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerFishingLicence $consumerFishingLicence)
    {
        //
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function consumerFishingLicence_validation($request): array
    {
        return $this->validate($request,[
            'data.*.fishing_country_id_fk'  => 'required',
            'data.*.fishing_state'  => 'required',
            'data.*.fishing_license_id'  => 'required',
        ]);
    }
}
