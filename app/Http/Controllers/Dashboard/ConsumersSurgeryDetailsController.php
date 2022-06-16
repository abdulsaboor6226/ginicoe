<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\Consumers_surgery_details;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;

class ConsumersSurgeryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumers_surgery_details = Consumers_surgery_details::latest()->paginate(10);
        return view('dashboard.consumers_surgery_details.index',compact('GeneralWebmasterSections','consumers_surgery_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('dashboard.consumers_surgery_details.create',compact('GeneralWebmasterSections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'surgery_location_on_face'=> 'required',
            'surgery_date'=> 'required',
            'surgeon_salutation'=> 'required',
            'surgeon_first_name'=> 'required',
            'surgeon_middle_name'=> 'nullable',
            'surgeon_last_name'=> 'required',
            'surgeon_contact_number'=> 'required',
            'medical_practice_name'=> 'required',
            'building_number'=> 'required',
            'street'=> 'required',
            'suite'=> 'required',
            'address_1'=> 'required',
            'address_2'=> 'nullable',
            'urbanization_name'=> 'required',
            'country'=> 'required',
            'state'=> 'required',
            'city'=> 'required',
            'zip'=> 'required',
            'area_code'=> 'required',
        ]);
        $consumers_surgery_details = Consumers_surgery_details::create($request->except('_token'));
        if ($consumers_surgery_details)
        {
            return redirect()->route('consumers_surgery_details.index')->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consumers_surgery_details  $consumers_surgery_details
     * @return \Illuminate\Http\Response
     */
    public function show(Consumers_surgery_details $consumers_surgery_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consumers_surgery_details  $consumers_surgery_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumers_surgery_details = Consumers_surgery_details::findOrFail($id);
        return view('dashboard.consumers_surgery_details.edit',compact('GeneralWebmasterSections','consumers_surgery_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consumers_surgery_details  $consumers_surgery_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'surgery_location_on_face'=> 'required',
            'surgery_date'=> 'required',
            'surgeon_salutation'=> 'required',
            'surgeon_first_name'=> 'required',
            'surgeon_middle_name'=> 'nullable',
            'surgeon_last_name'=> 'required',
            'surgeon_contact_number'=> 'required',
            'medical_practice_name'=> 'required',
            'building_number'=> 'required',
            'street'=> 'required',
            'suite'=> 'required',
            'address_1'=> 'required',
            'address_2'=> 'nullable',
            'urbanization_name'=> 'required',
            'country'=> 'required',
            'state'=> 'required',
            'city'=> 'required',
            'zip'=> 'required',
            'area_code'=> 'required',
        ]);
        $consumers_surgery_details = Consumers_surgery_details::whereId($id)->update($request->except('_token','_method'));
        if ($consumers_surgery_details)
        {
            return redirect()->route('consumers_surgery_details.index')->with('doneMessage',"Successfully record updated");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consumers_surgery_details  $consumers_surgery_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumers_surgery_details $consumers_surgery_details)
    {
        //
    }
}
