<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AllCountry;
use App\Models\Consumer;
use App\Models\ConsumerCard;
use App\Models\ConsumerFaceDetail;
use App\Models\ConsumerFacialSurgery;
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
        $consumers = Consumer::with('driving_licence','aviation','fire_arms','fishing','hunting','medicaids','medicares','non_US_employment','passport','twins')->latest()->paginate(10);
        $counties = AllCountry::all();
        $consumers_cards = ConsumerCard::latest()->paginate(10);
        $consumers_face_details = ConsumerFaceDetail::latest()->paginate(10);
        $consumers_surgery_details = ConsumerFacialSurgery::latest()->paginate(10);
        return view('dashboard.consumers.index',compact('GeneralWebmasterSections','consumers','consumers_cards','consumers_face_details','consumers_surgery_details','counties'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->personal_info_validation($request);
        $consumers = Consumer::create($request->except('_token','main_tab','sub_tab'));
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
    public function edit($id ,$main_tab = null,$sub_tab = null)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumer = Consumer::whereId($id)->with('driving_licence','aviation','fire_arms','fishing','hunting','medicaids','medicares','non_US_employment','passport','twins')->first();
        $main_tab = $main_tab !=null ? $main_tab :'primary_info';
        $sub_tab = $sub_tab !=null ? $sub_tab :'personal_info';
        $countries = AllCountry::all();
        $consumers_cards = ConsumerCard::latest()->paginate(10);
        $consumers_face_details = ConsumerFaceDetail::latest()->paginate(10);
        $consumers_surgery_details = ConsumerFacialSurgery::latest()->paginate(10);
        return view('dashboard.consumers.edit',compact('GeneralWebmasterSections','countries','sub_tab','main_tab','consumer','consumers_cards','consumers_face_details','consumers_surgery_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Consumer $consumer
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
        if($request->main_tab=='primary_info' && $request->sub_tab=='personal_info'){
            $this->personal_info_validation($request);
            $main_tab = 'primary_info';
            $sub_tab = 'birth_detail';
        }
        if($request->main_tab=='primary_info' && $request->sub_tab=='birth_detail'){
            $this->birth_detail($request);
            $main_tab = 'primary_info';
            $sub_tab = 'emergency_info';
        }
        if($request->main_tab=='primary_info' && $request->sub_tab=='emergency_info'){
            $this->emergency_info_validation($request);
            $main_tab = 'primary_info';
            $sub_tab = 'secondary_info';
        }
        if($request->main_tab=='primary_info' && $request->sub_tab=='secondary_info'){
            $this->secondary_info_validation($request);
            $main_tab = 'primary_info';
            $sub_tab = 'appearance_and_features';
        }
        if($request->main_tab=='primary_info' && $request->sub_tab=='appearance_and_features'){
            $this->appearance_and_features_validation($request);
            $main_tab = 'primary_info';
            $sub_tab = 'professional_info';
        }
        if($request->main_tab=='primary_info' && $request->sub_tab=='professional_info'){
            $this->professional_info_validation($request);
            $main_tab = 'multi_values_form_data';
            $sub_tab = 'driving_licence';
        }
        $consumer = Consumer::whereId($id)->update($request->except('_token','_method','main_tab','sub_tab'));
        if ($consumer)
        {
            if($request->main_tab=='primary_info' && $request->sub_tab=='professional_info'){
                return redirect()->route('consumers.index')->with('doneMessage',"Successfully record save");
            }
            else{
                return $this->edit($id,$main_tab,$sub_tab);
            }
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function personal_info_validation($request): array
    {
        return $this->validate($request,[
            'salutation'=> 'required',
            'first_name'=> 'required',
            'middle_name'=> 'nullable',
            'last_name'=> 'required',
            'birthday'=> 'required',
            'primary_email'=> 'required|email|unique:consumers,primary_email',
            'primary_phone'=> 'required',
            'current_us_urbanization_name'=> 'nullable',
            'current_us_address_1'=> 'required',
            'current_us_address_2'=> 'nullable',
            'current_us_city'=> 'required',
            'current_us_state'=> 'required',
            'current_us_zip'=> 'required',
            'current_us_area_code'=> 'required',
            'social_security'=> 'nullable',
            'credit_privacy'=> 'nullable',
            'mask'=> 'nullable',
            'current_us_lived_for_more_than_two_years'=> 'nullable'
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function birth_detail($request): array
    {
        return $this->validate($request,[
            'birth_country_id_fk'=> 'required',
            'birth_state'=> 'required',
            'birth_city'=> 'required',
            'birth_hospital'=> 'nullable',
            'birth_house_number'=> 'nullable',
            'birth_street_name'=> 'required',
            'birth_urbanization_names'=> 'nullable',
            'birth_zip'=> 'required',
            'birth_area_code'=> 'required',
            'date_of_birth'=> 'required|before:today',
            'mid_wife_first_name'=> 'nullable',
            'mid_wife_last_name'=> 'nullable',
            'first_responder_highway_name'=> 'nullable',
            'first_responder_street_name'=> 'nullable',
            'closest_bus_stop'=> 'nullable',
            'closest_intersection'=> 'nullable',
            'closest_parking_lot_name'=> 'nullable',
            'closest_train_station'=> 'nullable',
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function emergency_info_validation($request): array
    {
        return $this->validate($request,[
            'emergency_salutation'=> 'required',
            'emergency_phone'=> 'required',
            'emergency_email'=> 'required_if|email|unique:consumers,primary_email',
            'emergency_first_name'=> 'required',
            'emergency_middle_name'=> 'nullable',
            'emergency_last_name'=> 'nullable',
            'emergency_us_address_1'=> 'required',
            'emergency_us_address_2'=> 'required',
            'emergency_us_city'=> 'required',
            'emergency_us_state'=> 'required',
            'emergency_us_zip'=> 'required',
            'emergency_us_area_code'=> 'required',
            'emergency_us_urbanization_name'=> 'required',
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function secondary_info_validation($request): array
    {
        return $this->validate($request,[
            'secondary_phone'=> 'required',
            'secondary_email'=> 'required|email|unique:consumers,primary_email',
            'previous_us_address_1'=> 'required',
            'previous_us_address_2'=> 'nullable',
            'previous_us_state'=> 'required',
            'previous_us_city'=> 'required',
            'previous_us_zip'=> 'required',
            'previous_us_area_code'=> 'required',
            'previous_us_urbanization_name'=> 'nullable',
            'is_us_citizen'=> 'nullable',
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function appearance_and_features_validation($request): array
    {
        return $this->validate($request,[
            'complexion'=> 'required',
            'gender_identity'=> 'required',
            'sexual_orientation'=> 'nullable',
            'sex_assigned_at_birth'=> 'required',
            'marital_status'=> 'required',
            'height'=> 'required',
            'weight'=> 'required',
            'hair_color'=> 'required',
            'hair_style'=> 'nullable',
            'facial_hair'=> 'required',
            'eye_color'=> 'required',
            'prescribed_glasses'=> 'nullable',
            'Race'=> 'nullable',
            'allow_law_enforcement_to_know_your_disability'=> 'nullable',
            'disability_description'=> 'nullable',
            'medication'=> 'nullable',
            'hand_usage_preference'=> 'nullable',
        ]);
    }
    /**
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function professional_info_validation($request): array
    {
        return $this->validate($request,[
            'net_worth'=> 'nullable',
            'occupation'=> 'required',
            'state_id'=> 'required',
            'us_military_branch'=> 'required',
            'us_military'=> 'required',
            'us_employee_badge'=> 'required',
            'us_govt_badge_country_id_fk'=> 'nullable',
            'us_govt_badge_state'=> 'required',
            'us_govt_badge_id'=> 'required',
            'us_agency_description'=> 'nullable',
            'foreign_agency_description'=> 'nullable',
            'bureau_of_indian_affairs_card_number'=> 'nullable',
            'tribal_treaty_card_number'=> 'nullable',
            'tribal_id'=> 'nullable',
            'have_living_siblings'=> 'nullable',
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
