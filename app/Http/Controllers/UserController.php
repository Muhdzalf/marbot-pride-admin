<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $users = User::all();
        return view('pages.user.user-data', [
            'user' => User::class
        ]);
    }

    public function indexAdmin()
    {
        // $users = User::all();
        return view('pages.user.admin-data', [
            'admin' => User::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'birth_date' => $request->birth_date,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]
        );
        session()->flash('message', 'user berhasil ditambahkan');
        return redirect()->route('users.index');
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
        return view('users.update', [
            'item' => $user,
        ]);
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
        $data = $request->all();
        $user->update($data);
        session()->flash('message', $user->name . ' berhasil diupdate');
        return redirect()->route('users.index');
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
        session()->flash('message', $user->name . 'berhasil dihapus');
        return redirect()->route('users.index');
    }
}
