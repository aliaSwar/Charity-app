<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntryRequest;
use App\Models\Aid;
use App\Models\Entry;

use App\Models\Category;
use App\Models\Financial;
use App\Models\Identification_paper;
use App\Models\Person;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EntryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*        if (Entry::all() == null) {
            $entries = Entry::with('category', 'financial', 'status')->paginate(7);
        }
        else
        {
            $entries = Cache::remember('entries', 60 + 60 + 24, function () {
                return Entry::with('category', 'financial', 'status')->paginate(7);
            });
        }
 */
        $entries = Entry::with('category', 'financial', 'status')->paginate(7);
        return view('Entry.index', ['entries' =>  is_null($entries) ? null : $entries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $papers = Identification_paper::where('is_mdical', 0)->get();
        return view('Entry.create', [
            'categories' => Category::all(),
            'statuses' => Status::all(),
            'financials' => Financial::all(),
            'papers' => $papers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntryRequest $request)
    {
        //dd($request->all());
        $entry = new Entry();
        $entry->diwan_num = $request->diwan_num;
        $entry->registration_num = $request->registration_num;
        $entry->smartCard_num = $request->smartCard_num;
        $entry->phone_num = $request->phone_num;
        $entry->renewal_date = $request->renewal_date;
        $entry->entry_date = $request->entry_date;
        $entry->finshed_date = $request->finshed_date;
        $entry->family_num = $request->family_num;
        $entry->family_name = $request->family_name;
        $entry->address = $request->address;
        $entry->salary_charity = $request->salary_charity;
        $entry->category_id = $request->category_id;
        $entry->financial_id = $request->financial_id;
        $entry->status_id = $request->status_id;
        $entry->save();
        if ($request->papers != null) {
            $lost_paper = Identification_paper::where(function ($query) use ($request) {

                $query->where('is_mdical', 0)->whereNotIn('id', $request->papers);
            })->get();
            $entry->identification_papers()->sync($lost_paper);
        } else {
            $entry->identification_papers()->sync(Identification_paper::where('is_mdical', 0)->get());
        }
        if ($entry->family_num >= 1) {
            return redirect()->route('person.create',  ['entry' => $entry])->with('sucsess', 'تم اضافة مدرج بنجاح ');
            //return view('Person.createAjax');
        }
        return redirect()->route('entries.show', ['entry' => $entry])->with('sucsess', ' تم إضافة مدرج بنجاح ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        $people = Person::where('entry_id', $entry->id)->get();

        return view('Entry.show', ['entry' => $entry, 'people' => $people]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        return view('Entry.edit', $entry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntryRequest  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        $entry->update($request->all());
        return redirect()->route('entries.show', $entry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        //$entry->delete();
        $entry->delete();

        return redirect()->route('entries.index');
    }
    public function restoreAll()
    {
        //return "sfgdhgjkh";
        Entry::onlyTrashed()->restore();

        return redirect()->route('entries.index');
    }
    public function restore($id)
    {
        $entry = Entry::findOrFail($id);
        $entry->withTrashed()->restore();

        return redirect()->route('entries.show');
    }
}
