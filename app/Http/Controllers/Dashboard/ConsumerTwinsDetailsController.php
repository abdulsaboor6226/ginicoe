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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->consumerTwinsDetail_validation($request);
        $sub_tab = 'hunting';
        foreach ($request->data as  $value){
            $consumerTwinsDetail = ConsumerTwinsDetail::create($value);
        }
        if (!$consumerTwinsDetail)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerTwinsDetail->consumer_id_fk, 'main_tab'=> $request->main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Save");
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerTwinsDetails $consumerTwinsDetails
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
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
        if (!$consumerTwinsDetail)
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
     * @param  \App\Models\ConsumerTwinsDetails  $consumerTwinsDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consumerTwinsDetails = ConsumerTwinsDetail::findOrFail($id);
        $consumerTwinsDetailsDel= $consumerTwinsDetails->delete();
        $main_tab = 'multi_values_form_data';
        $sub_tab = 'twins';
        if (!$consumerTwinsDetailsDel)
        {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('consumers.edit',['id' =>$consumerTwinsDetails->consumer_id_fk, 'main_tab'=> $main_tab,'sub_tab'=>$sub_tab])->with('doneMessage',"Successfully record Deleted");
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function consumerTwinsDetail_validation($request): array
    {
        return $this->validate($request,[
            'data.*.living_twin_salutation' => 'required',
            'data.*.living_twin_first_name' => 'required',
            'data.*.living_twin_middle_name' => 'nullable',
            'data.*.living_twin_last_name' => 'required',
            'data.*.twin_classification' => 'required',
            'data.*.difference_with_the_twin' => 'required',
            'data.*.twin_gender' => 'required',
        ]);
    }
}
