<?php

namespace App\Http\Controllers;

use App\Models\Mdical_entry;
use App\Http\Requests\StoreMdical_entryRequest;
use App\Http\Requests\UpdateMdical_entryRequest;
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
            'mdicals'  => Mdical_entry::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mdical.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMdical_entryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMdical_entryRequest $request)
    {
        /* dd($request->all()); */
        $mdical = Mdical_entry::create($request->validated());

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
