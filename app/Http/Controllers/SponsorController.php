<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SponsorPublished;
use Illuminate\Support\Facades\Hash;

class SponsorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Sponsor.index', ['sponsors' => Sponsor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSponsorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSponsorRequest $request)
    {

        $pass = 'aid' . '-' . $request->phone;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'  => $request->phone,
            'password' => Hash::make($pass),
        ]);

        Notification::send($user, new SponsorPublished($user, $pass));
        $sponsor = Sponsor::create([
            'address' => $request->address,
            'user_id' => $user->id
        ]);

        return redirect()->route('sponsors.show', ['sponsor' => $sponsor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        return view('Sponsor.show', ['sponsor' => $sponsor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view('Sponsor.edit', ['sponsor' => $sponsor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorRequest  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $pass = 'aid-update' . '-' . $this->phone;
        $user = User::findOrFail($sponsor->user_id);
        $request->authenticate($user, $pass);


        Notification::send($user, new SponsorPublished($user, $pass));
        $sponsor->update([
            'address' => $request->address,
            'user_id' => $user->id
        ]);

        return redirect()->route('sponsors.show', ['sponsor' => $sponsor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('sponsors.index')->with(['sucess' => 'تم حذف الكفيل من الجمعية']);
    }
}
