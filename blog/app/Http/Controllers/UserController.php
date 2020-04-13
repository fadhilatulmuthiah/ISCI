<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
            $listdojang = \App\Dojang::all();
            session(['form_mode' => 'register']);
            return view('panel.registration', ['data' => $logeduser, 'dojang' => $listdojang]);
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
        $this->validate($request, [
            'username' => 'required|min:5|max:20|unique:\App\User,username',
            'password' => 'required|min:6',
            'confirmation_password' => 'required|same:password',
            'noreg' => 'required|unique:\App\User,no_reg',
            'nama' => 'required',
            'notlp' => 'required',
            'tgllahir' => 'required',
            'tmplahir' => 'required',
            'alamat' => 'required',
            'tmptujian' => 'nullable',
            'tglujain' => 'nullable',
            'score' => 'nullable',
            'sabuk' => 'required',
            'dojang' => 'required',
            'role' => 'required',
            'foto' => 'required|between:0,5000|image'
        ]);
        $request->flashOnly(['password1', 'password2']);

        $foto = $request->file('foto');

        $newuser = new User;
        $newuser->username = $request->username;
        $newuser->password = Hash::make($request->password);
        $newuser->nama = $request->nama;
        $newuser->no_reg = $request->noreg;
        $newuser->phone = $request->notlp;
        $newuser->tanggal_lahir = $request->tgllahir;
        $newuser->tempat_lahir = $request->tmplahir;
        $newuser->alamat = $request->alamat;
        $newuser->sabuk_terakhir = $request->sabuk;
        $newuser->score_ujian = $request->score;
        $newuser->id_dojang = $request->dojang;
        $newuser->role = $request->role;
        $newuser->ujian_terakhir = $request->tglujian;
        $newuser->tmpt_ujian_terakhir = $request->tmptujian;
        $newuser->foto = $request->username . "." . $foto->getClientOriginalExtension();

        $foto->move(base_path('\public\images\userpicture'), $request->username . "." . $foto->getClientOriginalExtension());
        $newuser->save();
        Session::flash('message', 'Data User saved');
        Session::flash('alert-class', 'alert-success');
        return redirect("/detail/" . $request->username);
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
        if (Session::get('token')  ==$token) {
            $selecteduser = \App\User::findOrFail($id);
            $logeduser = \App\User::find(base64_decode(session('loggedas')));
            $listdojang = \App\Dojang::all();
            session(['form_mode' => 'edit']);
            return view("panel.registration", ['data' => $logeduser, 'dojang' => $listdojang, 'selecteduser' => $selecteduser]);
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
    public function edit(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required|min:5|max:20',
            'new_username' => 'required|min:5|max:20',
            'noreg' => 'required',
            'nama' => 'required',
            'notlp' => 'required',
            'tgllahir' => 'required',
            'tmplahir' => 'required',
            'tmptujian' => 'nullable',
            'tglujain' => 'nullable',
            'score' => 'nullable',
            'alamat' => 'required',
            'sabuk' => 'required',
            'dojang' => 'required',
            'role' => 'required'
        ]);

        $edituser = \App\User::findOrFail($request->username);
        $edituser->username = $request->new_username;
        $edituser->nama = $request->nama;
        $edituser->phone = $request->notlp;
        $edituser->no_reg = $request->noreg;
        $edituser->tanggal_lahir = $request->tgllahir;
        $edituser->tempat_lahir = $request->tmplahir;
        $edituser->alamat = $request->alamat;
        $edituser->sabuk_terakhir = $request->sabuk;
        $edituser->score_ujian = $request->score;
        $edituser->id_dojang = $request->dojang;
        $edituser->role = $request->role;
        $edituser->ujian_terakhir = $request->tglujian;
        $edituser->tmpt_ujian_terakhir = $request->tmptujian;

        $edituser->update();

        $find_user = \App\User::find($request->new_username);
        $token = $find_user['username'].$find_user['role'].$find_user['nama'];
        $token = md5($token);
        $request->session()->put('token', ($token));
        $request->session()->put('auth', ($find_user['role']));
        $request->session()->put('loggedas', ($find_user['username']));

        Session::flash('message', 'Data User updated');
        Session::flash('alert-class', 'alert-success');
        return redirect("/detail/" . $request->new_username);
    }

    public function edit_pic(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required|min:5|max:20',
            'foto' => 'required|between:0,5000|image'
        ]);

        $foto = $request->file('foto');
        $edituser = \App\User::findOrFail($request->username);
        $edituser->foto = $request->username . "." . $foto->getClientOriginalExtension();

        $foto->move(base_path('\public\images\userpicture'), $request->username . "." . $foto->getClientOriginalExtension());

        $edituser->update();
        Session::flash('message', 'Data User updated');
        Session::flash('alert-class', 'alert-success');
        return redirect("/detail/" . $request->username);
    }

    public function edit_pass(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required|min:5|max:20',
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirmation_new_password' => 'required|same:new_password',
        ]);
        
        $edituser = \App\User::findOrFail($request->username);
        $hashedPassword = $edituser['password'];
        if (Hash::check($request->old_password, $hashedPassword)) {
            $edituser->password = Hash::make($request->new_password);

            $edituser->update();
            Session::flash('message', 'Data User updated');
            Session::flash('alert-class', 'alert-success');
            return redirect("/detail/" . $request->username);
        }else{
            Session::flash('message', 'Old password false');
            Session::flash('alert-class', 'alert-danger');
            return redirect("/detail/" . $request->username);
        }
    }

    public function edit_forcepass(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required|min:5|max:20',
            'new_password' => 'required|min:6',
            'confirmation_new_password' => 'required|same:new_password',
        ]);
        
        $edituser = \App\User::findOrFail($request->username);
        $edituser->password = Hash::make($request->new_password);

        $edituser->update();
        Session::flash('message', 'Data User updated');
        Session::flash('alert-class', 'alert-success');
        return redirect("/detail/" . $request->username);
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
        $deluser = \App\User::findOrFail($id);
        $foto = $deluser->foto;
        $todel = "/public/images/userpicture/" . $foto;
        #dump(base_path());
        File::delete(base_path($todel));
        $deluser->delete();
        Session::flash('message', 'Data User Deleted');
        Session::flash('alert-class', 'alert-danger');
        return redirect("/table");
    }
}
