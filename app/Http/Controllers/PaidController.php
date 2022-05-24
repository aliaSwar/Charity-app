<?php

namespace App\Http\Controllers;

use App\Models\Paid;
use App\Http\Requests\StorePaidRequest;
use App\Http\Requests\UpdatePaidRequest;

class PaidController extends BaseController
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
     * @param  \App\Http\Requests\StorePaidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaidRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function show(Paid $paid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function edit(Paid $paid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaidRequest  $request
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaidRequest $request, Paid $paid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paid $paid)
    {
        //
    }
}
