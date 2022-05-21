<?php

namespace App\Http\Controllers;

use App\Models\Identification_paper;
use App\Http\Requests\StoreIdentification_paperRequest;
use App\Http\Requests\UpdateIdentification_paperRequest;
use Illuminate\Support\Str;

class IdentificationPaperController extends Controller
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
        $pepar = new Identification_paper();
        $pepar->name = $request->name;
        $pepar->slug = Str::slug($request->name, '-');
        if ($request->has('image_upload')) {
            $image = $request->image_upload;
            $path = $image->store('paper-images', 'public');
            $pepar->image = $path;
        }
        $pepar->save();
        return redirect()->route('papers.show', ['paper' => $pepar]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function show(Identification_paper $identification_paper)
    {
        return view('Paper.show', $identification_paper);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Identification_paper $pepar)
    {
        return view('Paper.edit', $pepar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdentification_paperRequest  $request
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdentification_paperRequest $request, Identification_paper $pepar)
    {
        $pepar->name = $request->name;
        $pepar->slug = Str::slug($request->name, '-');
        if ($request->has('image_upload')) {
            $image = $request->image_upload;
            $path = $image->store('paper-images', 'public');
            $pepar->image = $path;
        }
        $pepar->save();
        return redirect()->route('papers.show', ['paper' => $pepar]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Identification_paper  $identification_paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identification_paper $pepar)
    {
        $pepar->delete();
        return redirect()->route('papers.index');
    }
}
