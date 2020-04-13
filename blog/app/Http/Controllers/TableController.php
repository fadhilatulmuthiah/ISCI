<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $logeduser = \App\User::find(($request->session()->get('loggedas')));
        $token = $logeduser['username'].$logeduser['role'].$logeduser['nama'];
        $token = md5($token);
        if ($request->session()->get('token') ==$token) {
            $student = \App\User::where('role', 'student')->get();
            $staff = \App\User::whereIn('role', ['admin', 'super_admin'])->get();
            return view('panel.table', ['data' => $logeduser, 'list' => $student, 'staff' => $staff]);
        } else {
            $errors = 'Session Expired';
            return view('front.login', ['message' => $errors]);
        }
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
        $logeduser = \App\User::find((Session::get('loggedas')));
        $token = $logeduser['username'].$logeduser['role'].$logeduser['nama'];
        $token = md5($token);
        if (Session::get('token')  == $token) {
            $getuser = \App\User::find($id);
            $userdojang = \App\Dojang::find($getuser['id_dojang']);
            $usermedal = \App\Achievement::where('username', $getuser['username'])->get();
            
            return view('panel.detailperson', ['dojang' => $userdojang, 'data' => $getuser, 'achievs' => $usermedal]);
        }else{
            $errors = 'Session Expired';
            return view('front.login', ['message' => $errors]);
        }
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
