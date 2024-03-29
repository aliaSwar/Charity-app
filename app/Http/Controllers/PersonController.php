<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Entry;
use App\Models\Orphan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;

class PersonController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Person.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Entry $entry)
    {

        return view('Person.create', ['entry' => $entry]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entry $entry)
    {

        $person = new Person();
        $person->number_id = $request->number_id;
        $person->full_name = $request->full_name;
        $person->phone = $request->phone;
        $person->health_status = $request->health_status;
        $person->work = $request->work;
        $person->category = $request->category;
        $person->status = $request->status;
        $person->family_status = $request->family_status;
        $person->education = $request->education;
        $person->notes = $request->notes;
        $person->birthday = $request->birthday;
        $person->entry_id = $entry->id;
        $entry->increment('current_person');
        $entry->save();

        $person->save();
        //dd($person);
        if ($entry->current_person === $entry->family_num) {
            return view('Person.show', ['person' => $person])->with(['data' => 'تم اضافة جميع أفراد العائلة بنجاح']);
        }
        // return redirect()->route('person.show', ['person' => $person])->with(['message' => 'success add all family number ']);

        return redirect()->route('person.create', ['entry' => $entry])->with(['success' => 'تم اضافة فرد آخر إلى  العائلة']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {

        return view('Person.show', ['person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('Person.edit', ['person' => $person]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonRequest  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $entry = Entry::findOrFail($person->entry_id);
        $entry->decrement('family_num');
        if ($person->orphan and $person->category == 'الأم') {
            DB::table('orphans')->where('person_id', $person->id)->delete();
            $people = DB::table('people')->where('entry_id', $person->entry_id)->where('orphan', true)->get();
            foreach ($people as $per) {
                ///where in
            }
        }
        $person->delete();
        return redirect()->route('entries.index')->with(['delete' => 'تم حذف احد افراد العائلة']);
    }
}
