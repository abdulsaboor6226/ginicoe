<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Imports\VulnerabilitiesStatisticsImport;
use App\Models\Permissions;
use App\Models\VulnerabilitiesStatistics;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class VulnerabilitiesStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
            $vulnerabilities = VulnerabilitiesStatistics::latest()->paginate(20);
            $Permissions = Permissions::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();

        return view("dashboard.vulnerabilities.index", compact("vulnerabilities", "Permissions", "GeneralWebmasterSections"));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VulnerabilitiesStatistics::truncate();
        $import = Excel::import(new VulnerabilitiesStatisticsImport, $request->file);
        return redirect()->back()->with('success', 'All good!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VulnerabilitiesStatistics  $vulnerabilitiesStatistics
     * @return \Illuminate\Http\Response
     */
    public function show(VulnerabilitiesStatistics $vulnerabilitiesStatistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VulnerabilitiesStatistics  $vulnerabilitiesStatistics
     * @return \Illuminate\Http\Response
     */
    public function edit(VulnerabilitiesStatistics $vulnerabilitiesStatistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VulnerabilitiesStatistics  $vulnerabilitiesStatistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VulnerabilitiesStatistics $vulnerabilitiesStatistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VulnerabilitiesStatistics  $vulnerabilitiesStatistics
     * @return \Illuminate\Http\Response
     */
    public function destroy(VulnerabilitiesStatistics $vulnerabilitiesStatistics)
    {
        //
    }
}
