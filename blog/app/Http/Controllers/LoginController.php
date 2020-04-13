<?php

namespace App\Http\Controllers;

use App\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('front.login', ['message' => null]);
    }

    public function verify(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:5|max:20',
            'password' => 'required'
        ]);
        #dump($request);
        
        $find_user = \App\User::find($request['username']);
        $hashedPassword = $find_user['password'];
        if (Hash::check($request['password'], $hashedPassword)) {
            $token = $find_user['username'].$find_user['role'].$find_user['nama'];
            $token = md5($token);
            $request->session()->put('token', ($token));
            $request->session()->put('auth', ($find_user['role']));
            $request->session()->put('loggedas', ($find_user['username']));
            return redirect('panel');
        } else {
            $errors = 'Check your username and password';
            return view('front.login', ['message' => $errors]);
        }
    }

    public function logout(Request $request)
    {
        //
        $request->session()->flush();
        return view('front.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
