<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Http\Requests\StoreFinancialRequest;
use App\Http\Requests\UpdateFinancialRequest;
use Illuminate\Support\Str;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Financial.index', ['financials' => Financial::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Financial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFinancialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinancialRequest $request)
    {
        $financial = new Financial();
        $financial->type = $request->type;
        $financial->slug = Str::slug($request->type);
        $financial->saveOrFail();
        return redirect()->route('financials.show', ['financial' => $financial]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(Financial $financial)
    {
        return view('Financial.show', ['financial' => $financial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(Financial $financial)
    {
        return view('Financial.edit', ['financial' => $financial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinancialRequest  $request
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinancialRequest $request, Financial $financial)
    {
        $financial->update(
            [
                'type'  => $request->type,
                'slug'  => Str::slug($request->type, '-')
            ]
        );
        return redirect()->route('financials.show', $financial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financial $financial)
    {
        $financial->delete();
        return redirect()->route('financials.index')->with(['message' => 'تم حذف الفئة بنجاح']);
    }
}
