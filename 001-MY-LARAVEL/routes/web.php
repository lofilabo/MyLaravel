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
    return view('welcome');
});


Route::get('/somepage', function () {
    return view('somepage');
});
Route::get('/pwdresetform', function () {
    return view('pwdresetform');
});

Route::get('pwdreset', 'App\Http\Controllers\pwdresetController@pwdreset_stepone_web')->name('pwdresetentry');
Route::post('pwdreset', 'App\Http\Controllers\pwdresetController@pwdreset_stepone_web')->name('pwdresetentry');
Route::get('pwdchange', 'App\Http\Controllers\pwdresetController@pwdreset_steptwo');
Route::get('pwdresetexe', 'App\Http\Controllers\pwdresetController@pwdreset_stepthree_web');
Route::post('pwdresetexe', 'App\Http\Controllers\pwdresetController@pwdreset_stepthree_web');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pwdresets', App\Http\Controllers\pwdresetController::class);

Route::resource('basicdatas', App\Http\Controllers\basicdatasController::class);

Route::resource('jobs', App\Http\Controllers\jobsController::class);

Route::resource('dtjobs', App\Http\Controllers\dtjobsController::class);

Route::resource('pulldown1s', App\Http\Controllers\pulldown1sController::class);

Route::resource('testfield1s', App\Http\Controllers\testfield1sController::class);

Route::resource('testfield2s', App\Http\Controllers\testfield2sController::class);

Route::resource('testfield3s', App\Http\Controllers\testfield3sController::class);

Route::resource('jobcategories', App\Http\Controllers\jobcategoriesController::class);

Route::resource('articles', App\Http\Controllers\ArticlesController::class);

Route::resource('articlecategories', App\Http\Controllers\ArticlecategoriesController::class);

Route::resource('lessons', App\Http\Controllers\lessonsController::class);

Route::resource('catDefAgeGroups', App\Http\Controllers\CatDef_AgeGroupController::class);

Route::resource('catDefSubjects', App\Http\Controllers\CatDef_SubjectController::class);

Route::resource('catDefTopics', App\Http\Controllers\CatDef_TopicController::class);

Route::resource('catDefConcepts', App\Http\Controllers\CatDef_ConceptController::class);

Route::resource('lessonsTwoCols', App\Http\Controllers\LessonsTwoColsController::class);

Route::resource('lessonsadvs', App\Http\Controllers\LessonsadvController::class);

Route::resource('applicationTrackings', App\Http\Controllers\Application_TrackingController::class);

Route::resource('postAdverts', App\Http\Controllers\Post_AdvertsController::class);

Route::resource('employers', App\Http\Controllers\employerController::class);

Route::resource('employerjobs', App\Http\Controllers\EmployerjobsController::class);

Route::resource('employerJobApplications', App\Http\Controllers\EmployerJobApplicationController::class);

Route::resource('statuses', App\Http\Controllers\statusController::class);

Route::resource('zzzpractices', App\Http\Controllers\zzzpracticeController::class);

Route::resource('zzzwibbles', App\Http\Controllers\zzzwibbleController::class);


Route::resource('zzznibbles', App\Http\Controllers\zzznibbleController::class);