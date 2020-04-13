<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});
Route::get('/coach', 'FrontController@coach_display');

Route::get('/login', 'LoginController@index');
Route::post('/verify', 'LoginController@verify');
Route::get('/logout', 'LoginController@logout');

Route::get('/panel', 'PanelController@index');
Route::get('/print_dashboard', function () {
    $logeduser = \App\User::find(session('loggedas'));
    $userdojang = \App\Dojang::find($logeduser['id_dojang']);
    $usermedal = \App\Achievement::where('username', $logeduser['username'])->get();

    $pdf = PDF::loadview('panel.printdashboard', ['dojang' => $userdojang, 'data' => $logeduser, 'achievs' => $usermedal]);

    return $pdf->download('InformationSheet.pdf');
});

Route::get('/achiev', 'AchievementController@index');
Route::get('/getfile/{id}', 'AchievementController@getfile');
Route::get('/addachiev', 'AchievementController@form_add');
Route::get('/waitinglist', 'AchievementController@waitinglist');
Route::get('/deleteachiev/{id}', 'AchievementController@destroy');
Route::post('/newachiev', 'AchievementController@store');
Route::get('/konfirmasi/{id}', 'AchievementController@confirm');
Route::get('/tolak/{id}', 'AchievementController@reject');

Route::get('/table', 'TableController@index');
Route::get('/detail/{username}', 'TableController@show');

Route::get('/regis', 'UserController@index');
Route::get('/edituser/{username}', 'UserController@show');
Route::post('/newuser', 'UserController@store');
Route::post('/submit_edit', 'UserController@edit');
Route::post('/submit_pic', 'UserController@edit_pic');
Route::post('/submit_edit_pass', 'UserController@edit_pass');
Route::post('/submit_force_pass', 'UserController@edit_forcepass');
Route::get('/delete/{username}', 'UserController@destroy');

Route::get('/system', 'SystemController@index');
Route::get('/dojang', 'SystemController@dojang');
Route::post('/newdojang', 'SystemController@storedojang');
Route::get('/display/{username}', 'SystemController@store');
Route::get('/remove/{username}', 'SystemController@destroy');
Route::get('/adddojang', function () {
    return view('panel.formdojang');
});
Route::get('/deletedojang/{id}', 'SystemController@deldojang');
Route::get('/editdojang/{id}', 'SystemController@editdojang');
Route::post('/editdojang', 'SystemController@edit');
