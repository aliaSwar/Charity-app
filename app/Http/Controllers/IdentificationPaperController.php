<?php

namespace App\Http\Controllers;

use App\Models\Identification_paper;
use App\Http\Requests\StoreIdentification_paperRequest;
use App\Http\Requests\UpdateIdentification_paperRequest;
use Illuminate\Support\Str;

class IdentificationPaperController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = Identification_paper::all();
        return view('Paper.index', ['papers' => $papers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Paper.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIdentification_paperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdentification_paperRequest $request)
    {

        $paper = new Identification_paper();
        $paper->name = $request->name;
        $paper->slug = Str::slug($request->name, '-');
        if ($request->has('image')) {
            $image = $request->image;
            $path = $image->store('paper-images', 'public');
            $paper->image = $path;
        }
        $paper->is_mdical = $request->is_mdical;
        $paper->save();
        return redirect()->route('papers.show', ['paper' => $paper]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function show(Identification_paper $paper)
    {
        return view('Paper.show', ['paper' => $paper]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Identification_paper $paper)
    {
        return view('Paper.edit', $paper);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdentification_paperRequest  $request
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdentification_paperRequest $request, Identification_paper $paper)
    {
        $paper->name = $request->name;
        $paper->slug = Str::slug($request->name, '-');
        if ($request->has('image_upload')) {
            $image = $request->image_upload;
            $path = $image->store('paper-images', 'public');
            $paper->image = $path;
        }
        $paper->save();
        return redirect()->route('papers.show', ['paper' => $paper]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identification_paper $paper)
    {
        $paper->delete();
        return redirect()->route('papers.index')->with(['sucess' => 'الورقة حذفت بنجاح']);
    }
    public function indexAll()
    {

        $papers = Identification_paper::all();

        return view('Paper.lost', ['papers' => $papers]);
    }
}
