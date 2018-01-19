<?php

use Illuminate\Http\Request;
use App\Thread;
use App\Http\Resources\ThreadCollection;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('boo', function() {return ('hoo');});
// Route::get('allthreads/{prefix}', function($prefix) { 
//     return DB::table('users')->where('name','like', $prefix.'%')->get();
// });

Route::get('threads', function() {
    return new ThreadCollection(Thread::all());
});

Route::get('thread/{id}', function($id) {
    return App\Thread::withcount('replies')->get();
});
