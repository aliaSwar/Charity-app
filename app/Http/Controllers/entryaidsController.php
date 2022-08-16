<?php

namespace App\Http\Controllers;
use App\Models\Entry;
use App\Models\Aid;
use App\Models\entryaid;
use Illuminate\Http\Request;

class entryaidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $allentry=Entry::all();
       // return view('aid.index',compact('allentry'));

        $aids=Aid::all();
       // return $aiids;
           return view('aid.create',compact('aids','allentry'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->all()); */
        if ($request->has('selectAll')) {
            $entries=Entry::select('id')->get();
       foreach ($entries as $entry){
        $entry ->aids()->attach($request->aid_id,['date'=>$request->aid_date]);

        }} else {
       $aid=Aid::find($request->aid_id);
       $aid->entries()->attach($request->entryid,['date'=>$request->aid_date]);
        }
        $allentry=Entry::all();
        return view('aid.index',compact('allentry'));


    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        # code...
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getaid($entryid)
    {
      //  print($entryid);
         $entry=Entry::find($entryid);

      // $aids=entryaid::all()->where('entry_id', $entryid);


           $aids=$entry ->aids;
           //return  $a;
          return view('aid.show',compact('aids'));

    }

    public function getentryforaid(Request $request)
    {
       // $allentry=Entry::all();
        //return view('aid.index',compact('allentry'));
        // return $request->aid_id;
       // print($request->aid_id);
        print(1);



          //  return view('aid.index',compact('request','allentry'));

       // $entry=Entry::find(2);
      //  $entry ->aids()->attach($request->aid_id);
        // $aid=Aid::find(1);
          //return  $aid ->entries;
    }

    public function getentryforaiddd($id,$request)
    {

          //  return view('aid.show',compact('request'));

        $entry=Entry::find($id);
        $entry ->aids()->attach($request->aid_id,['date'=>$request->aid_date]);



        // $aid=Aid::find(1);
          //return  $aid ->entries;
    }


}
