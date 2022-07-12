<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserPublished;
use App\models\Permission;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Cache::remember('users', 60 + 60 + 24 * 15, function () {
            return User::all();
        });

        return view('User.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $names_perm = Permission::all();

        return view('User.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pass = 'inaash-alfqeer';
        $request->validate([
            'name'      =>   ['required', 'string', 'max:255'],
            'email'     =>   ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image'     =>   ['file', 'image', 'nullable'],
            'phone'     =>   ['string', 'numeric', 'unique:users', 'nullable', new PhoneNumber()],
            'selectAll' =>   ['nullable', 'string']

        ]);
        $path = null;
        if ($request->has('image')) {
            $image = $request->image;
            $path = $image->store('user-images', 'public');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($pass);
        $user->is_empolyee = true;
        $user->image = is_null($path) ? null : $path;
        $user->save();
        $user->roles()->attach($request->role_id);

        Notification::send($user, new UserPublished($user, $pass));




        return 'sucess';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
