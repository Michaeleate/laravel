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
	Artisan::call('config:clear');
    return 'Configurations cleared';
});

//Clear cache:
Route::get('/mike-cache-clear', function() {
	Artisan::call('cache:clear');
    return '<h1>Cache cleared - </h1>';
});

//Clear configuration cache:
Route::get('/mike-config-cache', function() {
	Artisan::call('config:Cache');
    return '<h1>Configurations cache cleared</h1>';
});

//Migrate Tables:
Route::get('/mike-migrate', function() {
	Artisan::call('migrate');
    return '<h1>Migrations completed</h1>';
});

//Rollback Tables:
Route::get('/mike-rollback', function() {
	Artisan::call('migrate:rollback');
    return '<h1>Rollback completed</h1>';
});

//Candidates Index Page
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home', 'HomeController@index')->name('home');

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
//View All Jobs posted - View
Route::get('/uvalljobs', 'JobsController@uvalljobs')->name('uvalljobs');
//User Search and Apply Jobs - View
Route::view('/applyjobs', 'users.applyjobs')->name('applyjobs');
//View Jobs Status - View
Route::get('/viewjobstatus', 'JobsController@ujallapplied')->name('ujallapplied');
//Apply Job by Candidate - View
Route::post('/user-apply-job/{jobid}', 'JobsController@userappjob')->name('user-apply-job');
//Buy Credits - View
Route::get('/buycredits', 'payController@buycredits')->name('buycredits');
//Payment gateway to buy Credits by candidate.
Route::post('/payment', 'payController@payment')->name('payment');
//If response from PayU Payment gateway is success.
Route::post('/payment_success', 'payController@spayment')->name('payment_success');
//If response from PayU Payment gateway is failed.
Route::post('/payment_failure', 'payController@fpayment')->name('payment_failure');
//If response from PayU Payment gateway is cancelled.
Route::post('/payment_cancel', 'payController@cpayment')->name('payment_cancel');
//------------------------RECRUITERS AREA--------------------------------------
//Recruiter register and Login
Route::view('/recruiter', 'auth.recruiter')->name('recruiter');
Route::post('rlogin','recruiter\Auth\LoginController@recruiterLogin')->name('rlogin');
Route::post('/rregister','recruiter\Auth\RegisterController@register')->name('rregister');
//Recruiters Index Page
Route::get('/recruiter/home', 'recruiter\RechomeController@index')->name('recruiter.home');
//Route::view('/home', 'home')->name('home');
Route::post('/recruiter/logout','recruiter\Auth\LoginController@logout')->name('rlogout');
//Create Recruiter Profile
Route::get('/recruiter/crecprofile', 'recruiter\RecprofController@crecprofile')->name('crecprofile');
//View Recruiter Profile
Route::get('/recruiter/vrecprofile', 'recruiter\RecprofController@vrecprofile')->name('vrecprofile');
//Update Recruiter Profile
Route::get('/recruiter/urecprofile', 'recruiter\RecprofController@crecprofile')->name('urecprofile'); 
//Update initial profile data
Route::post('/recruiter/upinfopdet', 'recruiter\RecpdetCont@upinfopdet');
//Update email and password
Route::post('/recruiter/upinfopdet1', 'recruiter\RecpdetCont@upinfopdet1');
//Update Personal data
Route::post('/recruiter/upinfopdet2', 'recruiter\RecpdetCont@upinfopdet2');
//Update Business data
Route::post('/recruiter/upinfobdet', 'recruiter\RecpdetCont@upinfobdet');
//Update Communication data
Route::post('/recruiter/updatecom', 'recruiter\RecpdetCont@updatecom');
//Update About you data
Route::post('/recruiter/uprecabout', 'recruiter\RecpdetCont@uprecabout');
//Update Social Links data
Route::post('/recruiter/updatesoc', 'recruiter\RecpdetCont@updatesoc');
//Update Professional Photo data
Route::post('/recruiter/uprecphoto', 'recruiter\RecpdetCont@uprecphoto');
//Update Specialized Area data
Route::post('/recruiter/uprecsarea', 'recruiter\RecpdetCont@uprecsarea');
//Update Qualification 10th data
Route::post('/recruiter/uprecxth', 'recruiter\RecpdetCont@uprecxth');
//Update Qualification 12th data
Route::post('/recruiter/uprecxiith', 'recruiter\RecpdetCont@uprecxiith');
//Update Qualification grad data
Route::post('/recruiter/uprecgrad', 'recruiter\RecpdetCont@uprecgrad');
//Update Qualification pg data
Route::post('/recruiter/uprecpg', 'recruiter\RecpdetCont@uprecpg');
//Update Employment data
Route::post('/recruiter/uprecemp', 'recruiter\RecpdetCont@uprecemp');
//Update Reference data
Route::post('/recruiter/uprecref1', 'recruiter\RecpdetCont@uprecref1');
Route::post('/recruiter/uprecref2', 'recruiter\RecpdetCont@uprecref2');
//Job Posting by Recruiter - View
Route::get('/postjob', 'JobsController@postjob')->name('postjob');
//Job Posting by Recruiter
Route::post('/recruiter/recpostjob', 'recruiter\RecjobCont@recpostjob')->name('recpostjob');
//After Jobpost successfully posted by Recruiter - View
Route::get('/recruiter/vlastjob', 'recruiter\RecjobCont@vlastjob')->name('vlastjob');
//View All Jobs posted by Recruiter - View
Route::get('/recruiter/valljobs', 'recruiter\RecjobCont@valljobs')->name('valljobs');
//View All Job applications received by Recruiter - View
Route::get('/recruiter/recgetjapp', 'recruiter\RecjobCont@recgetjapp')->name('recgetjapp');

//Search jobs by keywords View
Route::get('/searchjobs', 'JobsController@searchjobs')->name('searchjobs');
//View full job details with parameter job_id;
Route::get('/viewjob/{jobid}', 'JobsController@viewjobdet')->name('viewjobdet');
//View User profile by recruiter
Route::get('/viewuserprof/{userid}/{jobid}', 'JobsController@viewuserprof')->name('viewuserprof');
//Shortlisted for interview by recruiter
Route::post('/shortlist/{userid}/{jobid}', 'JobsController@shortlist')->name('shortlist');
//Not shortlisted for next round by recruiter
Route::post('/notshortlist/{userid}/{jobid}', 'JobsController@notshortlist')->name('notshortlist');
//Schedule Interview by recruiter
Route::post('/schinterview/{userid}/{jobid}', 'JobsController@schinterview')->name('schinterview');
//----------------------------ADMINS AREA-----------------------------------
//Admin view for registration and Login
Route::view('/mikeadmin', 'auth.admin')->name('admin');
//Admin Register and Login
Route::post('alogin','admin\Auth\LoginController@adminLogin')->name('alogin');
Route::post('/aregister','admin\Auth\RegisterController@register')->name('aregister');
Route::post('/admin/logout','admin\Auth\LoginController@logout')->name('alogout');
//Admins Index Page
Route::get('/admin/home', 'admin\AdmhomeController@index')->name('admin.home');
//Job Posting by Admin - View
Route::get('/admin/postjob', 'JobsController@pjbyadm')->name('admin.postjob');
//Job Posting by Admin
Route::post('/admin/admpostjob', 'admin\AdmjobCont@admpostjob')->name('admin.recpostjob');
//After Jobpost successfully posted by Recruiter - View
Route::get('/admin/vlastjob', 'admin\AdmjobCont@vlastjob')->name('admin.lastjob');
//View All Jobs posted by Recruiter - View
Route::get('/admin/valljobs', 'admin\AdmjobCont@valljobs')->name('admin.valljobs');

//Admin view for registration and Login
//Route::view('/admin/postjob', 'admin\CRjob-ajob')->name('admin.CRjob-ajob');

//Notyet
//Create Profile for candidate
Route::get('/admin/cadmprofile', 'admin\AdmprofCont@cadmprofile')->name('cadmprofile');
//View Candidate or Recruiters Profile
Route::get('/admin/vadmprofile', 'admin\AdmprofCont@vadmprofile')->name('vadmprofile');
//Update Candidate or Recruiters Profile
Route::get('/admin/uadmprofile', 'admin\AdmprofCont@cadmprofile')->name('uadmprofile'); 

//Apply Job by Candidate - View
Route::post('/user-apply-job/{jobid}', 'JobsController@userappjob')->name('user-apply-job');

//Job Posting by Recruiter
Route::post('/recruiter/recpostjob', 'recruiter\RecjobCont@recpostjob')->name('recpostjob');
 