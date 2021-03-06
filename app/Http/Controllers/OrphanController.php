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
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
    public function create(Request $request, Sponsor $sponsor)
    {
        $mothers = array();
        $people = Person::whereIn('id', $request->people)->get();
        foreach ($people as $person) {
            $entry = $person->entry_id;
            $mothers[] = Person::where('category', 'الأم')
                ->where('entry_id', $entry)
                ->where('orphan', false)
                ->first();
        }

        return view('Orphan.create', [
            'sponsor'    => $sponsor,
            'types'      => Type::all(),
            'financials' => Financial::all(),
            'people'     => $people,
            'mothers'    => $mothers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrphanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrphanRequest $request, Sponsor $sponsor)
    {
        foreach ($request->people as $key => $person) {
            Orphan::create([
                'sponsor_id'    => $sponsor->id,
                'salary_month'  => $request->salary_month,
                'salary_year'   => $request->salary_year,
                'begin_date'    => $request->begin_date,
                'end_date'      => $request->end_date,
                'mother_is_ok'  => $request->mother_is_ok,
                'type_id'       => $request->type_id,
                'person_id'     => $person
            ]);
            Person::where('id', $person)->update([
                'orphan'  => true
            ]);
        }
        $mother = Person::where('id', $request->mother_is_ok)->first();
        if ($mother  != null) {
            $mother->update([
                'orphan'  => true
            ]);
            return redirect()->route('sponsors.show', $sponsor);
        }
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
            'statuss'    => Status::all(),
            'people'    => Person::orderBy('entry_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(StoreFilterRequest $request, Sponsor $sponsor)
    {
        if ($request->filter_age() == null) {
            return view('Orphan.create-filter', [
                'sponsor'    => $sponsor,
                'financials' => Financial::all(),
                'categories' => Category::all(),
                'statuss'    => Status::all(),
                'people'    => Person::orderBy('entry_id')->get()
            ])->with(['data' => 'لا يوجد أفراد بهذه الصفات']);
        }
        foreach ($request->filter_age() as $key => $person) {
            if ($request->filter_entry($person->entry->id)) {
                $people[] = $person;
            }
        }
        return view('Orphan.create-filter', [
            'people'     => $people,
            'sponsor'    => $sponsor,
            'financials' => Financial::all(),
            'categories' => Category::all(),
            'statuss'    => Status::all(),

        ]);
    }
}
