<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Rules\UniqueEmail;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersRequestUpdate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $roles = Role::all();
        $users = User::paginate(10);
        //dump($roles);
        //dump($users);
        return view('users.index',[
            'users' => $users,
            'roles' => $roles,
            'flatSelectedRoles'=>$user->roles()->pluck('id')->toArray()
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
        //TODO do poprawy dodawanie!! zeby encrypt sie robil 
        //TODO poprawic zapis hasla !! jesli jest nie zmienione nie wysylaj go!!!
        $user = User::create($request->all());
        $user->roles()->attach($request->get('roles_id'));
        $data = $request->all();
        $data['password']= bcrypt($data['password']);
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
        $roles=Role::all();
        return view('users.edit',[
        'user'=>$user,
        'roles'=>$roles,
        'flatSelectedRoles'=>$user->roles()->pluck('id')->toArray()
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
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        $user->roles()->sync($request->get('role_id'));
        return redirect( route('users.index') );

        // $user-> save();
        // return redirect( route('users.index') );
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