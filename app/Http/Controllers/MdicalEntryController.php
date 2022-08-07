<?php

namespace App\Http\Controllers;

use App\Models\Mdical_entry;
use App\Http\Requests\StoreMdical_entryRequest;
use App\Http\Requests\UpdateMdical_entryRequest;
use App\Models\Identification_paper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MdicalEntryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Mdical.index', [
            'mdicals'  => Mdical_entry::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $papers = Identification_paper::where('is_mdical', 1)->get();
        return view('Mdical.create', ['papers' => $papers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMdical_entryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mdical = new  Mdical_entry();
        $mdical->name_recipient = $request->name_recipient;
        $mdical->notes = $request->notes;
        $mdical->phone = $request->phone;
        $mdical->husband_name = $request->husband_name;
        $mdical->wife_name = $request->wife_name;
        $mdical->whos = $request->whos;
        $mdical->birthday = $request->birthday;
        $mdical->illness = $request->illness;
        $mdical->address = $request->address;
        $mdical->session_decision = $request->session_decision;
        $mdical->save();


        $mdical->identification_papers()->sync($request->papers);
        return redirect()->route('mdicals.show', ['mdical' => $mdical])->with('success', 'تم اضافة المدرج الطبي بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function show(Mdical_entry $mdical)
    {
        return view('Mdical.show', [
            'mdical'  => $mdical
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Mdical_entry $mdical)
    {
        return view('Mdical.show', [
            'mdical'  => $mdical
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMdical_entryRequest  $request
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMdical_entryRequest $request, Mdical_entry $mdical)
    {
        $mdical = Mdical_entry::update($request->validated());

        return redirect()->route('mdicals.show')->with('success', 'تم تعديل المدرج الطبي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mdical_entry $mdical)
    {
        $mdical->delete();
        return redirect()->route('mdicals.index');
    }
}
