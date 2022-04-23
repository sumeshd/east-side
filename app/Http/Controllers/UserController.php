<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$userdata=User::latest()->paginate(5);
        $userdata=User::all();
        return view('user_master.show_user',compact('userdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('user_master.create_user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role_id' => 'required',
        ]);
        $user = new user ([
            'email' => $request -> email ,
            'name' => $request -> name ,
            'password' => bcrypt($request -> password) ,
            'role_id' => $request -> role_id,
        ]);
        $user->save();
        return redirect('user');
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
    public function passwordedit($id)
    {
        $user = User::find($id);
        return view('user_master.edit_password',compact('user'));
    }
    public function edit($id)
    {
        $roles = Role::get();
        $user = User::find($id);
        return view('user_master.edit_user',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request, $id)
    {

    }
    public function update(Request $request, $id)
    {
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('User');

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
