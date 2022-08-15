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
            'orphans' => Orphan::orderBy('is_finsh')->paginate(5)
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

        foreach ($request->people as  $person) {
            if (Person::where('id',  $person)->where('category', 'الأم')->get()) {
                $mother_is_ok = true;
            } else  $mother_is_ok = false;
            Orphan::create([
                'sponsor_id'    => $sponsor->id,
                'salary_month'  => $request->salary_month / count($request->people),
                'salary_year'   => $request->salary_year / count($request->people),
                'begin_date'    => $request->begin_date,
                'end_date'      => $request->end_date,
                'mother_is_ok'  => $mother_is_ok,
                'type_id'       => $request->type_id,
                'person_id'     => $person
            ]);
            Person::where('id', $person)->update([
                'orphan'  => true
            ]);
        }


        return redirect()->route('sponsors.show', $sponsor);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orphan  $orphan
     * @return \Illuminate\Http\Response
     */
    public function show(Orphan $orphan)
    {
        foreach (Orphan::where('sponsor_id', $orphan->sponsor_id)->where('salary_month', $orphan->salary_month)->get() as $person) {
            $people[] = Person::findOrFail($person->person_id);
            $sponsor = Sponsor::findOrFail($person->sponsor_id);
        }
        /* return $people; */
        return view('Orphan.show', [
            'orphan' => $orphan,
            'people' => $people,
            'sponsor' => $sponsor,
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
        $orphan->delete();

        return redirect()->route('categories.index');
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
            'people'    => Person::where('category', '!=', 'الأب')
                ->where('orphan', false)
                ->orderBy('entry_id')->get()
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
                'people'    => Person::where('category', '!=', 'الأب')
                    ->where('orphan', false)
                    ->orderBy('entry_id')->get()
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
