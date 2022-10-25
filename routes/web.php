<?php

use App\Http\Controllers\UserController;
use App\Models\Blog;
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
})->name('home');


Route::get('clients', function () {
    dd('Only users');
    return view('users');
})->name('home-users');

Route::get('db', function () {
    // $users = DB::select('select * from users');

    // User::create([
    //     'name' => 'lara',
    //     'email' => 'mail@lara.com',
    //     'password' => 'pass'
    // ]);


    // $users = User::all();

    // return json_encode($users);

    // dd($users);

    // $user = User::factory()->create();

    // dd($user);

    $blog = Blog::factory(10)->create();

    dd($blog);

    echo 'Hi!';
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    // Route::group([
    //     'prefix' => 'users',
    // ], function () {
    //     Route::get('/', [UserController::class, 'index']);
    //     Route::get('/create', [UserController::class, 'create']);
    //     Route::post('/', [UserController::class, 'store']);
    //     Route::get('/{id}', [UserController::class, 'show']);
    //     Route::get('/{id}/edit', [UserController::class, 'edit']);
    //     Route::patch('/{id}', [UserController::class, 'update']);
    //     Route::delete('/{id}', [UserController::class, 'destroy']);
    // });
    Route::resource('users', UserController::class);
});
