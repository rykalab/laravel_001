<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Rules\UniqueEmail;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Controllers\UsersController;
use App\Http\Requests\UsersRequestUpdate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::paginate(10);
        //dump($users->role());
        return view('users.index',[
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.create',[
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request,User $user)
    {
       $user = User::create($request->all());
       $user->roles()->attach($request->get('roles_id'));
       $data = $request->all();
       $data['password']=bcrypt($data['password']);
    return redirect( route('users.index') );
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
    public function edit(User $user)
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.create',[
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequestUpdate $request,User $user)
    {
        $user-> name = $request -> name;
        $user-> email = $request -> email;
        $user-> password = bcrypt($request -> password);
        $user-> save();
        return redirect( route('users.index') );
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
        return redirect( route('users.index') );
    }
}
