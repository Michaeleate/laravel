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


//Create Profile Candidate
Route::get('/user-profile', 'RegUserProfController@createprofile')->name('createprofile');
//View Profile Candidate
Route::get('/view-user-profile', 'RegUserProfController@viewprofile')->name('viewprofile');
//Edit Profile Candidate
Route::get('/edit-user-profile', 'RegUserProfController@createprofile')->name('editprofile');

//Edit profile visibility Candidate
Route::get('/edit-user-visible', 'RegUserProfController@editprofvisible');

Auth::routes();
Auth::routes(['verify' => true]);

//Update Resume Headline Candidate
Route::post('/resumehead','HeadlineController@updatehead')->name('resumehead');
//Upload Resume Candidate
Route::post('/uploadresume','UploadResumeController@uploadresume')->name('uploadresume');
//Update Key Skills Candidate
Route::post('/updatekskills','KeySkillsController@updatekskills')->name('updatekskills');
//Update Personal Details Candidate
Route::post('/updatepdet','PdetailsController@updatepdet')->name('updatepdet');

//Education Details Candidate
//Update 10th Class Candidate
Route::post('/updatexth','EduController@updatexth')->name('updatexth');
//Update 12th Class Candidate
Route::post('/updatexiith','EduController@updatexiith')->name('updatexiith');
//Update graduation Candidate
Route::post('/updategrad','EduController@updategrad')->name('updategrad');
//Update post graduation Candidate
Route::post('/updatepg','EduController@updatepg')->name('updatepg');

//Employment Details of Candidate
//Last Organization Details of Candidate
Route::post('/updateemp','EmpController@updateemp')->name('updateemp');

//Current and Permanent Address of Candidate
//Current Address in Candidate profile
Route::post('/updatecadd','AddController@updatecadd')->name('updatecadd');
//Permanent Address in Candidate profile
Route::post('/updatepadd','AddController@updatepadd')->name('updatepadd');

//Update Candidate Reference details
Route::post('/updateref1','RefController@updateref1')->name('updateref1');
Route::post('/updateref2','RefController@updateref2')->name('updateref2');

//Recruiter register and Login
Route::view('/recruiter', 'auth.recruiter')->name('recruiter');

//Create Recruiter Profile
Route::get('/crecprofile', 'RecprofController@crecprofile')->name('crecprofile');
//View Recruiter Profile
Route::get('/vrecprofile', 'RecprofController@vrecprofile')->name('vrecprofile');
//Update Recruiter Profile
Route::get('/urecprofile', 'RecprofController@urecprofile')->name('urecprofile');