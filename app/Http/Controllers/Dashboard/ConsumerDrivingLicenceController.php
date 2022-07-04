<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumerDrivingLicence;
use Illuminate\Http\Request;

class ConsumerDrivingLicenceController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerDrivingLicence  $consumerDrivingLicence
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerDrivingLicence $consumerDrivingLicence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerDrivingLicence  $consumerDrivingLicence
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerDrivingLicence $consumerDrivingLicence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerDrivingLicence  $consumerDrivingLicence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        dd($request->all(),$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerDrivingLicence  $consumerDrivingLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerDrivingLicence $consumerDrivingLicence)
    {
        //
    }
}
