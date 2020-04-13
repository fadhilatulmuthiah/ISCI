<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Dojang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
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
            $listcoaches = DB::table('users')
                ->join('coaches', 'users.username', '=', 'coaches.username_coach')
                ->select('*')
                ->get();
            #dump($listcoaches);

            $listavailability = DB::table('users')
                ->leftJoin('coaches', 'users.username', '=', 'coaches.username_coach')
                ->where('coaches.username_coach', null)
                ->get();
            #dump($listavailability);
            return view('panel.sys_view', ['data' => $logeduser, 'list' => $listcoaches, 'staff' => $listavailability]);
        } else {
            $errors = 'Session Expired';
            return view('front.login', ['message' => $errors]);
        }
    }

    public function dojang(Request $request)
    {
        //
        $logeduser = \App\User::find(($request->session()->get('loggedas')));
        $token = $logeduser['username'].$logeduser['role'].$logeduser['nama'];
        $token = md5($token);
        if ($request->session()->get('token') ==$token) {
            $list = \App\Dojang::all();
            return view('panel.listdojang', ['data' => $list]);
        } else {
            $errors = 'Session Expired';
            return view('front.login', ['message' => $errors]);
        }
    }

    public function editdojang($id)
    {
        //
        $logeduser = \App\User::find(($request->session()->get('loggedas')));
        $token = $logeduser['username'].$logeduser['role'].$logeduser['nama'];
        $token = md5($token);
        if (Session::get('token') == $token) {
            $list = \App\Dojang::findOrFail($id);
            session(['form_mode' => 'edit']);
            return view('panel.formdojang', ['data' => $list]);
        } else {
            $errors = 'Session Expired';
            return view('front.login', ['message' => $errors]);
        }
    }

    public function deldojang($id)
    {
        //
        $userdojang = \App\User::where('id_dojang', $id)->get();
        if(count($userdojang) == 0){
            $deldojang = \App\Dojang::findOrFail($id);
            $deldojang->delete();
            Session::flash('message', 'Dojang deleted');
            Session::flash('alert-class', 'alert-danger');
            return redirect("/dojang");
        }else{
            Session::flash('message', 'Failed to delete dojang : some user registered in this dojang');
            Session::flash('alert-class', 'alert-danger');
            return redirect("/dojang");
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
    public function storedojang(Request $request)
    {
        //
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'phone' => 'required'
        ]);

        $newdojang = new Dojang();
        $newdojang->nama = $request->nama;
        $newdojang->alamat = $request->alamat;
        $newdojang->phone = $request->phone;
        $newdojang->save();
        Session::flash('message', 'New Dojang saved');
        Session::flash('alert-class', 'alert-success');
        return redirect("/dojang");
    }

    public function store($id)
    {
        //
        $newcoach = new Coach();
        $newcoach->username_coach = $id;
        $newcoach->save();
        return redirect("/system");
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
    public function edit(Request $request)
    {
        //
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'phone' => 'required'
        ]);

        $editdojang = \App\Dojang::findOrFail($request->id);
        $editdojang->nama = $request->nama;
        $editdojang->alamat = $request->alamat;
        $editdojang->phone = $request->phone;
        $editdojang->update();
        Session::flash('message', 'New Dojang saved');
        Session::flash('alert-class', 'alert-success');
        return redirect("/dojang");
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
        $deluser = \App\Coach::findOrFail($id);
        $deluser->delete();
        return redirect("/system");
    }
}
