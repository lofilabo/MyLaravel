<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\jobsController;

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

Route::get('pwdreset', 'App\Http\Controllers\pwdresetController@pwdreset_stepone');
Route::get('pwdresetexe', 'App\Http\Controllers\pwdresetController@pwdreset_stepthree');

Route::group(['middleware' => ['auth:api', 'role:admin']], function() {
	Route::get('/user', function (Request $request) {
	    return $request->user();
	});

});


Route::put('/lessonadv/{id}' , 'App\Http\Controllers\LessonsadvController@api_updateLessonInfo');
Route::post('/lessonadv/' , 'App\Http\Controllers\LessonsadvController@api_makeLessonInfo');
Route::get('/lessonadv/{id}' , 'App\Http\Controllers\LessonsadvController@api_showLessonInfo');
Route::get('/lessonadv' , 'App\Http\Controllers\LessonsadvController@api_showLessonInfoAll');
Route::delete('/lessonadv/{id}' , 'App\Http\Controllers\LessonsadvController@api_delete_Lesson');

Route::get('/allcategories/' , 'App\Http\Controllers\LessonsadvController@getAllListOptions');

Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

//Route::group(['middleware' => ['auth:api', 'role:manager']], function() { // Routes here });
Route::middleware('auth:api')->post('collectdata', 'TestController@collectdata');

Route::post('login', function (Request $request) {
    
    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        // Authentication passed...
        $user = auth()->user();
        $user->api_token = Str::random(64);
        $user->save();
        return $user;
    }
    
    return response()->json([
        'error' => 'Unauthenticated user',
        'code' => 401,
    ], 401);
});

Route::middleware('auth:api')->post('logout', function (Request $request) {
    
    if (auth()->user()) {
        $user = auth()->user();
        $user->api_token = null; // clear api token
        $user->save();

        return response()->json([
            'message' => 'Thank you for using our application',
        ]);
    }
    
    return response()->json([
        'error' => 'Unable to logout user',
        'code' => 401,
    ], 401);
});


Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});


