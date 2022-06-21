<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumers = Consumer::latest()->paginate(10);
        return view('dashboard.consumers.index',compact('GeneralWebmasterSections','consumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('dashboard.consumers.create',compact('GeneralWebmasterSections'));
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
            'salutation'=> 'required',
            'first_name'=> 'required',
            'middle_name'=> 'nullable',
            'last_name'=> 'required',
            'birthday'=> 'required',
            'primary_email'=> 'required',
            'primary_phone'=> 'required',
            'current_us_address_1'=> 'required',
            'current_us_address_2'=> 'nullable',
            'current_us_urbanization_name'=> 'nullable',
            'current_us_city'=> 'required',
            'current_us_state'=> 'required',
            'current_us_zip'=> 'required',
            'current_us_area_code'=> 'nullable',
            'current_us_lived_for_more_than_two_years'=> 'required'
        ]);
        $consumers = Consumer::create($request->except('_token'));
        if ($consumers)
        {
            return redirect()->route('consumers.edit',$consumers->id)->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function show(Consumer $consumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function edit($id , $tabName= null)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumer = Consumer::findOrFail($id);
        $tabName = $tabName !=null ? $tabName :'primary_info';
        return view('dashboard.consumers.edit',compact('GeneralWebmasterSections','consumer','tabName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Consumer $consumer
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
        if($request->tab=='primary_info'){
            $this->primary_info_validation($request);
            $tabName = 'secondary_info';
        }
        if($request->tab=='secondary_info'){
            $this->secondary_info_validation($request);
            $tabName = 'additional_info';
        }
        if($request->tab=='additional_info'){
            $this->additional_info_validation($request);
            $tabName = 'additional_info';
        }
        $consumer = Consumer::whereId($id)->update($request->except('_token','_method','tab'));
        if ($consumer)
        {
            return $this->edit($id,$tabName);
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function primary_info_validation($request): array
    {
        return $this->validate($request,[
            'salutation'=> 'required',
            'first_name'=> 'required',
            'middle_name'=> 'nullable',
            'last_name'=> 'required',
            'birthday'=> 'required',
            'primary_email'=> 'required',
            'primary_phone'=> 'required',
            'current_us_address_1'=> 'required',
            'current_us_address_2'=> 'nullable',
            'current_us_urbanization_name'=> 'nullable',
            'current_us_city'=> 'required',
            'current_us_state'=> 'required',
            'current_us_zip'=> 'required',
            'current_us_area_code'=> 'nullable',
            'current_us_lived_for_more_than_two_years'=> 'required'
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function secondary_info_validation($request): array
    {
        return $this->validate($request,[
            'social_security_number'=> 'required',
            'credit_privacy'=> 'required',
            'mask'=> 'nullable',
            'previous_us_address_1'=> 'required',
            'previous_us_address_2'=> 'required',
            'previous_us_urbanization_name'=> 'required',
            'previous_us_city'=> 'required',
            'previous_us_state'=> 'required',
            'previous_us_zip'=> 'nullable',
            'previous_us_area_code'=> 'nullable',
            'secondary_email'=> 'required',
            'secondary_phone'=> 'required',
            'emergency_salutation'=> 'required',
            'emergency_first_name'=> 'nullable',
            'emergency_last_name'=> 'required',
            'emergency_middle_name'=> 'required',
            'emergency_us_address_1'=> 'required',
            'emergency_us_address_2'=> 'required',
            'emergency_us_urbanization_name'=> 'required',
            'emergency_us_city'=> 'nullable',
            'emergency_us_state'=> 'nullable',
            'emergency_us_zip'=> 'required',
            'emergency_us_area_code'=> 'nullable',
            'emergency_email'=> 'nullable',
            'is_us_citizen'=> 'required',
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function additional_info_validation($request): array
    {
        return $this->validate($request,[
            'salutation'=> 'required',
            'first_name'=> 'required',
            'middle_name'=> 'nullable',
            'last_name'=> 'required',
            'birthday'=> 'required',
            'primary_email'=> 'required',
            'primary_phone'=> 'required',
            'current_us_address_1'=> 'required',
            'current_us_address_2'=> 'nullable',
            'current_us_urbanization_name'=> 'nullable',
            'current_us_city'=> 'required',
            'current_us_state'=> 'required',
            'current_us_zip'=> 'required',
            'current_us_area_code'=> 'nullable',
            'current_us_lived_for_more_than_two_years'=> 'required'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consumer = Consumer::findOrFail($id);
        $consumer= $consumer->delete();
        if ($consumer){
            return redirect()->route('consumers.index')->with('doneMessage','Successfully record Deleted');
        }
    }
}
