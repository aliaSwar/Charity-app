<?php

namespace App\Http\Controllers;

use App\Models\Paid;
use App\Http\Requests\StorePaidRequest;
use App\Http\Requests\UpdatePaidRequest;
use App\Models\Sponsor;

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
    public function create(Sponsor $sponsor)
    {
        return view('Paid.create', ['sponsor' => $sponsor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaidRequest $request, Sponsor $sponsor)
    {

        $paid = new Paid();
        $paid->amount = $request->amount;
        $paid->date_paid = $request->date_paid;
        $paid->sponsor_id = $sponsor->id;
        if ($request->has('image')) {
            $image = $request->image;
            $path = $image->store('paid-images', 'public');
            $paid->image = $path;
        }
        $paid->save();
        return redirect()->route('paids.show', ['paid' => $paid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function show(Paid $paid)
    {
        return view('Paid.show', ['paid' => $paid]);
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
