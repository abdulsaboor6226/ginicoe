<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\Discounts;
use App\Models\User;
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
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $users = User::all();
        return view('dashboard.discounts.create',compact('GeneralWebmasterSections','users'));
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
            'user_id'=> 'required',
            'type'=> 'required',
            'category'=> 'required',
            'discount'=> 'required',
        ]);
        $discounts = Discounts::create($request->except('_token'));
        if ($discounts)
        {
            return redirect()->route('discounts.index')->with('doneMessage',"Successfully record save");
        }
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
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $discounts = Discounts::findOrFail($id);
        $users = User::all();
        return view('dashboard.discounts.edit',compact('GeneralWebmasterSections','discounts','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'user_id'=> 'required',
            'type'=> 'required',
            'category'=> 'required',
            'discount'=> 'required',
        ]);
        $discounts = Discounts::whereId($id)->update($request->except('_token','_method'));
        if ($discounts)
        {
            return redirect()->route('discounts.index')->with('doneMessage',"Successfully record updated");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discounts::findOrFail($id);
        $discount= $discount->delete();
        if ($discount){
            return redirect()->route('discounts.index')->with('doneMessage','Successfully record Deleted');
        }
    }
}
