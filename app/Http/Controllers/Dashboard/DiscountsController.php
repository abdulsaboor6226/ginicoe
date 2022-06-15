<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\Discounts;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $discounts = Discounts::with('user')->latest()->paginate(10);
        return view('dashboard.discounts.index',compact('GeneralWebmasterSections','discounts'));
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
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function show(Discounts $discounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discounts $discounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discounts $discounts)
    {
        //
    }
}
