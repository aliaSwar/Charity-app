<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilterRequest;
use App\Models\Orphan;
use App\Http\Requests\StoreOrphanRequest;
use App\Http\Requests\UpdateOrphanRequest;
use App\Models\Category;
use App\Models\Entry;
use App\Models\Financial;
use App\Models\Person;
use App\Models\Sponsor;
use App\Models\Status;
use Illuminate\Contracts\View\View;

class OrphanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Orphan.index', [
            'orphans' => Orphan::paginate(13)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sponsor $sponsor)
    {
        return view('Orphan.create', [
            'sponsor' => $sponsor,
            'financials' => Financial::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrphanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrphanRequest $request)
    {
        $orphan = Orphan::create([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orphan  $orphan
     * @return \Illuminate\Http\Response
     */
    public function show(Orphan $orphan)
    {
        return view('Orphan.show', [
            'orphan' => $orphan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orphan  $orphan
     * @return \Illuminate\Http\Response
     */
    public function edit(Orphan $orphan)
    {
        return view('Orphan.edit', [
            'orphan' => $orphan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrphanRequest  $request
     * @param  \App\Models\Orphan  $orphan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrphanRequest $request, Orphan $orphan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orphan  $orphan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orphan $orphan)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_filter(Sponsor $sponsor)
    {
        return view('Orphan.create-filter', [
            'sponsor'    => $sponsor,
            'financials' => Financial::all(),
            'categories' => Category::all(),
            'statuss'    => Status::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(StoreFilterRequest $request, Sponsor $sponsor)
    {
        /* $people = array();
        foreach ($request->filter_entry() as $entry) {
            array_push($people, $request->filter_age($entry->id));
        } */
        dd($request->filter_orphan());

        return view('Orphan.filter', [
            'sponsor' => $sponsor,
            'data'  => $request->filter_orphan()
        ]);
    }
}
