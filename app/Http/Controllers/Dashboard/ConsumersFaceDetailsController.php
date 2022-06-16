<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\Consumers_face_details;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;

class ConsumersFaceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumers_face_details = Consumers_face_details::latest()->paginate(10);
        return view('dashboard.consumers_face_details.index',compact('GeneralWebmasterSections','consumers_face_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('dashboard.consumers_face_details.create',compact('GeneralWebmasterSections'));
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
            'type'=> 'required',
            'location'=> 'required',
            'size'=> 'required',
            'shape'=> 'required',
            'color'=> 'required',
        ]);
        $consumers_face_details = Consumers_face_details::create($request->except('_token'));
        if ($consumers_face_details)
        {
            return redirect()->route('consumers_face_details.index')->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consumers_face_details  $consumers_face_details
     * @return \Illuminate\Http\Response
     */
    public function show(Consumers_face_details $consumers_face_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consumers_face_details  $consumers_face_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumers_face_details = Consumers_face_details::findOrFail($id);
        return view('dashboard.consumers_face_details.edit',compact('GeneralWebmasterSections','consumers_face_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consumers_face_details  $consumers_face_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'type'=> 'required',
            'location'=> 'required',
            'size'=> 'required',
            'shape'=> 'required',
            'color'=> 'required',
        ]);
        $consumers_face_details = Consumers_face_details::whereId($id)->update($request->except('_token','_method'));
        if ($consumers_face_details)
        {
            return redirect()->route('consumers_face_details.index')->with('doneMessage',"Successfully record updated");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consumers_face_details  $consumers_face_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumers_face_details $consumers_face_details)
    {
        //
    }
}
