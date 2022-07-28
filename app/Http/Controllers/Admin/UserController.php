<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserPublished;

use App\Rules\PhoneNumber;
use GrahamCampbell\ResultType\Success;
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
        $users = User::where('is_empolyee', true)->paginate(7); /* Cache::remember('users', 60 + 60 + 24 * 15, function () {
            return
        }); */


        return view('User.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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




        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('User.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('User.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $pass = 'inaash-alfqeer' . $request->name;
        $request->validate([
            'name'      =>   ['required', 'string', 'max:255'],
            'email'     =>   ['required', 'string', 'email', 'max:255'],
            'image'     =>   ['file', 'image', 'nullable'],
            'phone'     =>   ['string', 'numeric', 'nullable', new PhoneNumber()],
            'selectAll' =>   ['nullable', 'string']

        ]);
        $path = null;
        if ($request->has('image')) {
            $image = $request->image;
            $path = $image->store('user-images', 'public');
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($pass);
        $user->is_empolyee = true;
        $user->image = is_null($path) ? null : $path;
        $user->save();
        
        ///update roles to user in table many ot many///

        DB::table('role_user')->where('user_id', $user->id)->updateOrInsert([
            'role_id' => $request->role_id
        ]);

        Notification::send($user, new UserPublished($user, $pass));
        return redirect()->route('users.show', ['user' => $user])->with(['success' => 'تم تحديث معلومات الموظف بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with(['Success' => 'تم حذف الموظف ']);
    }
}
