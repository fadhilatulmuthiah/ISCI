<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $logeduser = \App\User::find((Session::get('loggedas')));
        $token = $logeduser['username'].$logeduser['role'].$logeduser['nama'];
        $token = md5($token);
        if (Session::get('token')  ==$token) {
            $usermedal = \App\Achievement::where('username', ($request->session()->get('loggedas')))->get();
            #dump($usermedal);
            return view('panel.achievement', ['data' => $logeduser, 'achievements' => $usermedal]);
        } else {
            $errors = 'Session Expired';
            return view('front.login', ['message' => $errors]);
        }
    }

    public function waitinglist(Request $request)
    {
        //
        $logeduser = \App\User::find((Session::get('loggedas')));
        $token = $logeduser['username'].$logeduser['role'].$logeduser['nama'];
        $token = md5($token);
        if (Session::get('token')  ==$token) {
            $waitinglist = \App\Achievement::where('status', 'waiting')->get();
            return view('panel.achievement_waiting', ['data' => $logeduser, 'waitinglist' => $waitinglist]);
        } else {
            $errors = 'Session Expired';
            return view('front.login', ['message' => $errors]);
        }
    }

    public function confirm($id)
    {
        //
        $editachiev = \App\Achievement::findOrFail($id);
        $editachiev->status = 'confirmed';
        $editachiev->update();
        Session::flash('message', 'Submission CONFIRMED');
        Session::flash('alert-class', 'alert-success');
        return redirect("/waitinglist");
    }

    public function reject($id)
    {
        //
        $editachiev = \App\Achievement::findOrFail($id);
        $editachiev->status = 'rejected';
        $editachiev->update();
        Session::flash('message', 'Submission REJECTED');
        Session::flash('alert-class', 'alert-danger');
        return redirect("/waitinglist");
    }

    public function form_add(Request $request)
    {
        //
        $logeduser = \App\User::find((Session::get('loggedas')));
        $token = $logeduser['username'].$logeduser['role'].$logeduser['nama'];
        $token = md5($token);
        if (Session::get('token')  ==$token) {
            $usermedal = \App\Achievement::where('username', ($request->session()->get('loggedas')))->get();
            session(['form_mode' => 'achievement']);
            return view('panel.form_achievement', ['data' => $logeduser, 'achievements' => $usermedal]);
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
            'username' => 'required',
            'nama_event' => 'required',
            'tanggal_event' => 'required',
            'tempat_event' => 'required',
            'medali' => 'required',
            'lampiran' => 'required|between:0,6000|mimes:pdf',
            'keterangan' => 'required'
        ]);

        $file = $request->file('lampiran');

        $newachiev = new Achievement();
        $newachiev->username = $request->username;
        $newachiev->nama_event = $request->nama_event;
        $newachiev->tanggal_event = $request->tanggal_event;
        $newachiev->tempat_event = $request->tempat_event;
        $newachiev->medali = $request->medali;
        $newachiev->keterangan = $request->keterangan;
        $newachiev->status = 'waiting';
        $newachiev->lampiran = $request->username . "_" . $request->tanggal_event . "_" . $request->nama_event . "." . $file->getClientOriginalExtension();

        $file->move(base_path('\public\achiev-file'), $request->username . "_" . $request->tanggal_event . "_" . $request->nama_event . "." . $file->getClientOriginalExtension());
        $newachiev->save();
        Session::flash('message', 'Achievement submited, waiting for confirmation');
        Session::flash('alert-class', 'alert-success');
        return redirect("/achiev");
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
        $deluser = \App\Achievement::findOrFail($id);
        $doc = $deluser->lampiran;
        $todel = "/public/achiev-file/" . $doc;
        #dump(base_path());
        File::delete(base_path($todel));
        $deluser->delete();
        Session::flash('message', 'Achievement deleted');
        Session::flash('alert-class', 'alert-danger');
        return redirect("/panel");
    }

    public function getfile($id)
    {
        //
        $deluser = \App\Achievement::findOrFail($id);
        $doc = $deluser->lampiran;
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        $toget = "/public/achiev-file/" . $doc;
        return response()->download(base_path($toget), $doc, $headers);
    }
}
