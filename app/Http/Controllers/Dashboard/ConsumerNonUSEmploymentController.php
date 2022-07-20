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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->consumerNonUSEmployment_validation($request);
        foreach ($request->data as  $value){
            $consumerNonUSEmployment = ConsumerNonUSEmployment::create($value);
        }
        if (!$consumerNonUSEmployment)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.index')->with('doneMessage',"Successfully record save");
//            return redirect()->route('consumers.edit',['id' =>$consumerNonUSEmployment->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerNonUSEmployment $consumerNonUSEmployment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
        $this->consumerNonUSEmployment_validation($request);
        foreach ($request->data as  $value){
            if ($value['non_US_employment_id_pk'] == 0)
            {
                $consumerNonUSEmployment = ConsumerNonUSEmployment::create($value);
            }
            else{
                $consumerNonUSEmployment = ConsumerNonUSEmployment::findOrFail($value['non_US_employment_id_pk'])->update($value);
            }
        }
        if (!$consumerNonUSEmployment)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
                return redirect()->route('consumers.index')->with('doneMessage',"Successfully record save");
//            return redirect()->route('consumers.edit',['id' =>$request->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerNonUSEmployment  $consumerNonUSEmployment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $consumerNonUSEmployment = ConsumerNonUSEmployment::findOrFail($id);
        $consumerNonUSEmploymentDel= $consumerNonUSEmployment->delete();
        $main_tab = 'multi_values_form_data';
        $sub_tab = 'non_US_employment';
        if (!$consumerNonUSEmploymentDel)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerNonUSEmployment->consumer_id_fk, 'main_tab'=> $main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Deleted");
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function consumerNonUSEmployment_validation($request): array
    {
        return $this->validate($request,[
            'data.*.non_us_govt_badge_country_id_fk' => 'required',
            'data.*.non_us_govt_badge_state' => 'required',
            'data.*.non_us_govt_badge_id' => 'required',
        ]);
    }
}
