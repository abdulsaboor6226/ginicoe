<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use App\Models\Govt;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;

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
        $banks = Govt::with('daily_trades','asset_sizes','financial_institution_represents','FI_performses','job_titles','FI_charterTypes')->latest()->paginate(10);
        return view('dashboard.govt.index',compact('GeneralWebmasterSections','banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $jobTitles = Dictionary::jobTitle()->pluck('value','id');
        $FI_represents = Dictionary::FI_represent()->pluck('value','id');
        $FI_charterTypes = Dictionary::FI_Type()->pluck('value','id');
        $assetSizes = Dictionary::assetSize()->pluck('value','id');
        $FI_performses = Dictionary::FI_performs()->pluck('value','id');
        $dailyTrades = Dictionary::dailyTrade()->pluck('value','id');
        return view('dashboard.govt.create',compact('GeneralWebmasterSections','jobTitles','FI_represents','assetSizes','FI_performses','FI_charterTypes','dailyTrades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id ="";
        $this->govt_validation($request,$id);
        $request['user_id_fk'] = Auth::user()->id;
        $consumers = Govt::create($request->except('_token'));
        if (!$consumers) {
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
        $bank = Govt::findOrFail($id);
        $jobTitles = Dictionary::jobTitle()->pluck('value','id');
        $FI_represents = Dictionary::FI_represent()->pluck('value','id');
        $FI_charterTypes = Dictionary::FI_Type()->pluck('value','id');
        $assetSizes = Dictionary::assetSize()->pluck('value','id');
        $FI_performses = Dictionary::FI_performs()->pluck('value','id');
        $dailyTrades = Dictionary::dailyTrade()->pluck('value','id');
        return view('dashboard.govt.edit',compact('GeneralWebmasterSections','bank','jobTitles','FI_represents','assetSizes','FI_performses','FI_charterTypes','dailyTrades'));
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
        $this->govt_validation($request,$id);
        $request['user_id_fk'] = Auth::user()->id;
        $bank = Govt::whereId($id)->update($request->except('_token','_method'));
        if ($bank)
        {
            return redirect()->route('bank.index')->with('doneMessage',"Successfully record save");
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
        $merchant = Govt::destroy($id);
        if ($merchant){
            return redirect()->route('govt.index')->with('doneMessage','Successfully record Deleted');
        }
    }
    public function govt_validation($request,$id): array
    {
        return $this->validate($request,[
            'financial_institution_title' => 'required',
            'f_name' => 'required',
            'm_name' => 'nullable',
            'l_name' => 'required',
            'phone_no' => 'required',
            'email' => 'required|email|unique:banks,email,'.$id,
            'job_title' => 'required',
            'secondary_f_name' => 'nullable',
            'secondary_l_name' => 'nullable',
            'secondary_phone_no' => 'required',
            'secondary_fax_no' => 'required',
            'secondary_email' => 'nullable|email|unique:banks,secondary_email,'.$id,
            'financial_institution_represent.*' => 'nullable',
            'FI_type' => 'required',
            'FI_operate_across_state' => 'required',
            'asset_size' => 'nullable',
            'FI_performs.*' => 'required',
            'BIN' => 'required',
            'daily_trade' => 'required',
            'portfolio_size' => 'required',
        ]);
    }

}
