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

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    ;


    $da = array(
        'h1' => "header11",
        'h2' => "header2",
    );

    return view('login', $da);
});
Route::get('/home', 'ACRController@home');
Route::get('/users', 'ACRController@agents');
Route::get('/patients', 'ACRController@patients');
Route::get('/docpatients', 'ACRController@docpatients');
Route::get('/hiopatients', 'ACRController@hiopatients');
Route::get('/nokpatients', 'ACRController@nokpatients');
Route::get('/deleteuser/{id}', 'ACRController@deleteuser');


Route::get('/donationsman', 'ACRController@donationsman');
Route::get('/pledges/{id}', 'ACRController@pledges');
Route::get('/deletepledges/{id}', 'ACRController@deletepledges');

Route::get('/dpledges/{id}', 'ACRController@dpledges');

Route::get('/donations', 'ACRController@donations');
Route::post('/createdonations', 'ACRController@createdonations');

Route::post('/savepatientdetails', 'ACRController@savepatientdetails');
Route::post('/saveuserdetails', 'ACRController@saveuserdetails');
Route::post('/savedonations', 'ACRController@savedonations');
Route::post('/updatestatus', 'ACRController@updatestatus');
Route::post('/updateward', 'ACRController@updateward');
Route::post('/createplage', 'ACRController@createplage');

Route::post('/edituser', 'ACRController@edituser');





Route::get('/inbox', 'ACRController@inbox');
Route::get('/inbox/{id}', 'ACRController@getissue');
Route::get('assignedrequest', 'ACRController@assignedrequest');
Route::get('reports', 'ACRController@statusreport');
Route::get('reports2', 'ACRController@statusreport2');


Route::get('approvedreport', 'ACRController@approvedreport');


Route::get('/adminissue/{id}', 'ACRController@adminissue');
Route::get('/allrequests', 'ACRController@allrequests');
Route::get('/myissue_admin/{id}', 'ACRController@getissue');
Route::get('/patientdetails/{id}', 'ACRController@patientdetails');
Route::get('/docpatientdetails/{id}', 'ACRController@docpatientdetails');
Route::get('/hiopatientdetails/{id}', 'ACRController@hiopatientdetails');

Route::get('/assignto/{id}/{issueid}', 'ACRController@assignto');
Route::get('/close/{issueid}', 'ACRController@close');
Route::get('/pending/{issueid}', 'ACRController@pending');
Route::get('/myrequest', 'ACRController@myrequest');
Route::get('/timeline', 'ACRController@timeline');

Route::get('/timeline/{issueid}', 'ACRController@timeDetails');

Route::post('/login', 'ACRController@login');
Route::post('/compose', 'ACRController@compose');
Route::post('/adduser', 'ACRController@adduser');
Route::post('/createassessment', 'ACRController@createassessment');


