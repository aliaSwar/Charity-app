<?php

namespace App\Http\Controllers;

use App\Models\Identification_paper;
use App\Http\Requests\StoreIdentification_paperRequest;
use App\Http\Requests\UpdateIdentification_paperRequest;

class IdentificationPaperController extends Controller
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
     * @param  \App\Http\Requests\StoreIdentification_paperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdentification_paperRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function show(Identification_paper $identification_paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Identification_paper $identification_paper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdentification_paperRequest  $request
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdentification_paperRequest $request, Identification_paper $identification_paper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identification_paper $identification_paper)
    {
        //
    }
}
