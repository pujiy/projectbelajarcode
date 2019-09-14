<?php

use Illuminate\Http\Request;

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

Route::post('/auth', function(Request $request) {
    $valid = Auth::attempt($request->all());

    if($valid) {
        $user = Auth::user();
        $user->api_token = str_random(100);
        $user->save();


        return $user;
    } 

    return response()->json([
        'message' => 'Email & password doesn\'t match'
    ], 404);
});

Route::post('/user/register', 'Api\UserController@register');