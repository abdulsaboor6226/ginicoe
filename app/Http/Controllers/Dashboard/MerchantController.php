<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AllCountry;
use App\Models\Merchant;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $merchants = Merchant::with('country')->latest()->paginate(10);
        return view('dashboard.merchant.index',compact('GeneralWebmasterSections','merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $countries = AllCountry::all();
        return view('dashboard.merchant.create',compact('GeneralWebmasterSections','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->merchant_validation($request);
        $request['user_id_fk'] = Auth::user()->id;
        $consumers = Merchant::create($request->except('_token'));
        if (!$consumers) {
            return redirect()->back()->with('errorMessage', 'Oop! Something Went wrong');
        }
        else{
            return redirect()->route('merchant.index')->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $merchant = Merchant::whereId($id)->with('country')->first();
        $countries = AllCountry::all();
        return view('dashboard.merchant.edit',compact('GeneralWebmasterSections','countries','merchant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->merchant_validation($request);
        $request['user_id_fk'] = Auth::user()->id;
        $merchant = Merchant::whereId($id)->update($request->except('_token','_method'));
        if ($merchant)
        {
            return redirect()->route('merchant.index')->with('doneMessage',"Successfully record save");
        }
        else{
            return redirect()->back()->with('errorMessage','SomeThing went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = Merchant::destroy($id);
        if ($merchant){
            return redirect()->route('merchant.index')->with('doneMessage','Successfully record Deleted');
        }
    }

    public function merchant_validation($request): array
    {
        return $this->validate($request,[
            'business_legal_name' => 'required',
            'business_DBA_name' => 'required',
            'business_structure' => 'required',
            'business_legal_address' => 'required',
            'business_city' => 'required',
            'business_state' => 'required',
            'business_zip' => 'required',
            'business_country_id_fk' => 'required',
            'federal_tax_id' => 'required',
            'DUNS_number' => 'required',
            'ownership' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'phone_no' => 'required',
            'telephone_number' => 'nullable',
            'DOB' => 'required',
            'home_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country_id_fk' => 'required',
            'ownership_percentage' => 'nullable',
        ]);
    }
}
