<?php

namespace App\Http\Controllers;

use App\Models\Mdical_entry;
use App\Http\Requests\StoreMdical_entryRequest;
use App\Http\Requests\UpdateMdical_entryRequest;

class MdicalEntryController extends BaseController
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
     * @param  \App\Http\Requests\StoreMdical_entryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMdical_entryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function show(Mdical_entry $mdical_entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Mdical_entry $mdical_entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMdical_entryRequest  $request
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMdical_entryRequest $request, Mdical_entry $mdical_entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mdical_entry  $mdical_entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mdical_entry $mdical_entry)
    {
        //
    }
}
