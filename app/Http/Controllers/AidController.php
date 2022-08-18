<?php

namespace App\Http\Controllers;

use App\Models\Aid;
use App\Http\Requests\StoreAidRequest;
use App\Http\Requests\UpdateAidRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class AidController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aid.index', ['aids' => Aid::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aid.create-aid');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAidRequest $request)
    {

        $aid = new Aid();

        $aid->name = $request->name;
        $aid->slug = Str::slug($request->name, '-');
        if ($request->has('image')) {
            $image = $request->image;
            $path = $image->store('helper-image', 'public');
            $aid->image = $path;
        }
        $aid->notes = $request->notes;
        $aid->saveOrFail();

        return redirect()->route('aids.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aid  $aid
     * @return \Illuminate\Http\Response
     */
    public function show(Aid $aid)
    {
        return view('aid.show', ['aid' => $aid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aid  $aid
     * @return \Illuminate\Http\Response
     */
    public function edit(Aid $aid)
    {
        return view('aid.edit', [
            'aid'   => $aid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAidRequest  $request
     * @param  \App\Models\Aid  $aid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAidRequest $request, Aid $aid)
    {
        if ($request->has('image')) {
            $image = $request->image;
            $path = $image->store('helper-image', 'public');
        }
        $aid->update([
            'name'   => $request->name,
            'slug'   => Str::slug($request->name, '-'),
            'image'  => $path,
            'notes'  => $request->notes
        ]);

        return redirect()->route('aids.index')->with(['message' => 'تم تعديل المساعدة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aid  $aid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aid $aid)
    {
        $aid->delete();
        return redirect()->route('aids.index')->with(['message' => 'تم حذف المساعدة بنجاح']);
    }
}
