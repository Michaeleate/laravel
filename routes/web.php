<?php

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

//Clear configurations:
Route::get('/mike-config-clear', function() {
	$status = Artisan::call('config:clear');

    if($status == 1){
        return '<h1>Configurations cleared</h1>';
    }
    else{
        return '<h1>Configurations not cleared</h1>';
    }
});

//Clear cache:
Route::get('/mike-cache-clear', function() {
	$status = Artisan::call('cache:clear');
    
    if($status == 1){
        return '<h1>Cache cleared - </h1>';
    }
    else{
        return '<h1>Cache not cleared - </h1>';
    }
});

//Clear configuration cache:
Route::get('/mike-config-cache', function() {
	$status = Artisan::call('config:Cache');
    
    if($status == 1){
        return '<h1>Configurations cache cleared</h1>';
    }
    else{
        return '<h1>Configurations not cache cleared</h1>';
    }
});

//Migrate Tables:
Route::get('/mike-migrate', function() {
	$status = Artisan::call('migrate');
    //return '<h1>Migrations completed</h1>';
    if($status == 1){
        return '<h1>Migrations completed</h1>';
    }
    else{
        return '<h1>Migrations not completed</h1>';
    }
});

//Rollback Tables:
Route::get('/mike-rollback', function() {
	$status = Artisan::call('migrate:rollback');
    
    if($status == 1){
        return '<h1>Rollback completed</h1>';
    }
    else{
        return '<h1>Rollback not completed</h1>';
    }
});

//Candidates Index Page
Route::get('/home', 'HomeController@index')->name('home');
//Recruiters Index Page
Route::get('/rechome', 'RechomeController@index')->name('rechome');


//Create Profile
Route::get('/user-profile', 'RegUserProfController@createprofile')->name('createprofile');
//View Profile
Route::get('/view-user-profile', 'RegUserProfController@viewprofile')->name('viewprofile');
//Edit Profile
//Route::get('/edit-user-profile', 'RegUserProfController@editprofile');
Route::get('/edit-user-profile', 'RegUserProfController@createprofile')->name('editprofile');

//Edit profile visibility
Route::get('/edit-user-visible', 'RegUserProfController@editprofvisible');

Auth::routes();
Auth::routes(['verify' => true]);

//Update Resume Headline
Route::post('/resumehead','HeadlineController@updatehead')->name('resumehead');
//Upload Resume
Route::post('/uploadresume','UploadResumeController@uploadresume')->name('uploadresume');
//Update Key Skills
Route::post('/updatekskills','KeySkillsController@updatekskills')->name('updatekskills');
//Update Personal Details
Route::post('/updatepdet','PdetailsController@updatepdet')->name('updatepdet');

//Education Details
//Update 10th Class
Route::post('/updatexth','EduController@updatexth')->name('updatexth');
//Update 12th Class
Route::post('/updatexiith','EduController@updatexiith')->name('updatexiith');
//Update graduation
Route::post('/updategrad','EduController@updategrad')->name('updategrad');
//Update post graduation
Route::post('/updatepg','EduController@updatepg')->name('updatepg');

//Employment Details
//Last Organization Details
Route::post('/updateemp','EmpController@updateemp')->name('updateemp');

//Current and Permanent Address
//Current Address in profile
Route::post('/updatecadd','AddController@updatecadd')->name('updatecadd');
//Permanent Address in profile
Route::post('/updatepadd','AddController@updatepadd')->name('updatepadd');

//Update Reference details
Route::post('/updateref1','RefController@updateref1')->name('updateref1');
Route::post('/updateref2','RefController@updateref2')->name('updateref2');