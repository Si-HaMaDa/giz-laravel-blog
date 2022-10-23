<?php

use App\Models\User;
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
    return view('welcome');
});


Route::get('users', function () {
    return view('users');
});

Route::get('db', function () {
    // $users = DB::select('select * from users');

    User::create([
        'name' => 'lara',
        'email' => 'mail@lara.com',
        'password' => 'pass'
    ]);


    $users = User::all();

    // return json_encode($users);

    dd($users);

    echo 'Hi!';
});
