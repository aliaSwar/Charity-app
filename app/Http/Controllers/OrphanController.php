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
use Illuminate\Support\Facades\DB;

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

        $people = Person::whereIn('id', $request->people)->get();
        return view('Orphan.create', [
            'sponsor'    => $sponsor,
            'types'      => Type::all(),
            'people'     => $people,
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

        //dd(Type::findOrFail($request->type_id)->date);
        $monthly = $request->salary / Type::findOrFail($request->type_id)->date;

        $orphan = Orphan::create([
            'sponsor_id'    => $sponsor->id,
            'salary_month'  => $monthly,
            'salary'        => $request->salary,
            'begin_date'    => $request->begin_date,
            'end_date'      => $request->end_date,

            'type_id'       => $request->type_id,
        ]);
        dd($orphan->salary);
        foreach ($request->people as  $person) {
            Person::where('id', $person)->update([
                'orphan_id' =>  $orphan->id,
                'orphan'  => true
            ]);
        }


        return redirect()->route('orphans.show', ['orphan' => $orphan]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orphan  $orphan
     * @return \Illuminate\Http\Response
     */
    public function show(Orphan $orphan)
    {

        /* return $people; */
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
            'orphan' => $orphan,
            'types'   => Type::all(),

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
        $monthly = $request->salary / Type::findOrFail($request->type_id)->date;

        $orphan->sponsor_id = $orphan->sponsor_id;
        $orphan->salary_month = $monthly;
        $orphan->salary       = $request->salary;
        $orphan->begin_date   = $request->begin_date;
        $orphan->end_date    = $request->end_date;
        $orphan->type_id     = $request->type_id;

        $orphan->save();


        Person::where('id', $orphan->person_id)->update([
            'orphan'  => true,
            'orphan_id' => $orphan->id
        ]);
        return redirect()->route('orphans.show', [
            'orphan'  => $orphan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orphan  $orphan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orphan $orphan)
    {
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
