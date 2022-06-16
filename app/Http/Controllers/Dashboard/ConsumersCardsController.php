<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Models\Consumers_cards;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;

class ConsumersCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumers_cards = Consumers_cards::latest()->paginate(10);
        return view('dashboard.consumers_cards.index',compact('GeneralWebmasterSections','consumers_cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('dashboard.consumers_cards.create',compact('GeneralWebmasterSections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'card_type'=> 'required',
            'card_number'=> 'required',
            'primary_card_holder_first_name'=> 'required',
            'primary_card_holder_last_name'=> 'required',
            'bank','secondary_card_holder_relationship'=> 'required',
            'secondary_card_holder_first_name'=> 'nullable',
            'secondary_card_holder_last_name'=> 'nullable'
            ]);
        $consumers_cards = Consumers_cards::create($request->except('_token'));
        if ($consumers_cards)
        {
           return redirect()->route('consumers_cards.index')->with('doneMessage',"Successfully record save");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consumers_cards  $consumers_cards
     * @return \Illuminate\Http\Response
     */
    public function show(Consumers_cards $consumers_cards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consumers_cards  $consumers_cards
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $consumers_cards = Consumers_cards::findOrFail($id);
        return view('dashboard.consumers_cards.edit',compact('GeneralWebmasterSections','consumers_cards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consumers_cards  $consumers_cards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'card_type'=> 'required',
            'card_number'=> 'required',
            'primary_card_holder_first_name'=> 'required',
            'primary_card_holder_last_name'=> 'required',
            'bank','secondary_card_holder_relationship'=> 'required',
            'secondary_card_holder_first_name'=> 'nullable',
            'secondary_card_holder_last_name'=> 'nullable'
        ]);
        $consumers_cards = Consumers_cards::whereId($id)->update($request->except('_token','_method'));
        if ($consumers_cards)
        {
            return redirect()->route('consumers_cards.index')->with('doneMessage',"Successfully record updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consumers_cards  $consumers_cards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumers_cards $consumers_cards)
    {
        //
    }
}
