<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AllCountry;
use App\Models\Dictionary;
use App\Models\Govt;
use App\Models\WebmasterSection;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GovtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $govts = Govt::with('agency_types','govtTitle','cities','states','countries','agency_sector','budgeting_authorities')->latest()->get();
        return view('dashboard.govt.index',compact('GeneralWebmasterSections','govts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $titles = Dictionary::govtTitle()->pluck('value','id');
        $countries = AllCountry::all();
        $govtAgencySector = Dictionary::govtAgencySector()->pluck('value','id');
        $govtBudgetAmount = Dictionary::govtBudgetAmount()->pluck('value','id');
        $agencyType = Dictionary::agencyType()->pluck('value','id');
        return view('dashboard.govt.create',compact('GeneralWebmasterSections','countries','titles','govtAgencySector','govtBudgetAmount','agencyType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->govt_validation($request);
        $request['user_id_fk'] = Auth::user()->id;
        $govt = Govt::create($request->except('_token'));
        if (!$govt) {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('govt.index')->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Govt  $govt
     * @return \Illuminate\Http\Response
     */
    public function show(Govt $govt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Govt  $govt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $govt = Govt::findOrFail($id);
        $titles = Dictionary::govtTitle()->pluck('value','id');
        $countries = AllCountry::all();
        $govtAgencySector = Dictionary::govtAgencySector()->pluck('value','id');
        $govtBudgetAmount = Dictionary::govtBudgetAmount()->pluck('value','id');
        $agencyType = Dictionary::agencyType()->pluck('value','id');
        return view('dashboard.govt.edit',compact('GeneralWebmasterSections','govt','countries','titles','govtAgencySector','govtBudgetAmount','agencyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Govt  $govt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->govt_validation($request);
        $request['user_id_fk'] = Auth::user()->id;
        $govt = Govt::whereId($id)->update($request->except('_token','_method'));
        if ($govt)
        {
            return redirect()->route('govt.index')->with('doneMessage',"Successfully record save");
        }
        else{
            return redirect()->back()->with('errorMessage','SomeThing went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Govt  $govt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $govt = Govt::destroy($id);
        if ($govt){
            return redirect()->route('govt.index')->with('doneMessage','Successfully record Deleted');
        }
    }
    public function govt_validation($request): array
    {
        return $this->validate($request,[
            'f_name' => 'required',
            'l_name' => 'required',
            'phone_no' => 'required',
            's_phone_no' => 'nullable',
            'title' => 'required',
            'building_number' => 'required',
            'street_name' => 'required',
            'urbanization_number' => 'nullable',
            'country_id_fk' => 'required',
            'state_id_fk' => 'required',
            'city_id_fk' => 'required',
            'agency_type' => 'required',
            'zip_code' => 'required',
            'agency_sector_id_fk' => 'required',
            'agency_represent' => 'required',
            'budgeting_authority' => 'required',
            'amount_of_budgeting' => 'required',
            'how_ginicoe_help_you' => 'nullable',
        ]);
    }

}
