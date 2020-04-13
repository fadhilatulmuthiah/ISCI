<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;

class PanelController extends Controller
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
        if ($request->session()->get('token') == $token) {
            $userdojang = \App\Dojang::find($logeduser['id_dojang']);
            $usermedal = \App\Achievement::where('username', $logeduser['username'])->get();
            #dump($logeduser['tmpt_ujian_terakhir']);
            return view('panel.dashboard', ['dojang' => $userdojang, 'data' => $logeduser, 'achievs' => $usermedal]);
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
    public function print()
    {
        //
        $logeduser = \App\User::find(session('loggedas'));
        $userdojang = \App\Dojang::find($logeduser['id_dojang']);
        $usermedal = \App\Achievement::where('username', $logeduser['username'])->get();

        $pdf = Dompdf::loadview('pegawai_pdf', ['dojang' => $userdojang, 'data' => $logeduser, 'achievs' => $usermedal]);
        return $pdf->download('laporan-pegawai-pdf');
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
