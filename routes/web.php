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
// LVL 0
Route::get('/', 'AccountController@index');
// LVL 1
Route::get('/main', 'AccountController@mainPage');
// LVL 2
Route::get('/adminFunction', 'AccountController@adminFunctionPage');
Route::get('/registrationExamInfo', 'AccountController@registrationExamInfoPage');
Route::get('/registrationToExam', 'AccountController@registrationToExamPage');
Route::get('/vehicleInfo', 'AccountController@vehicleInfoPage');
Route::get('/accounts', 'AccountController@accountsPage');
Route::get('/driversLicense', 'AccountController@driversLicensePage');
// LVL 3
Route::get('/employee', 'AccountController@employeePage');
Route::get('/inventory', 'AccountController@inventoryPage');
Route::get('/client', 'AccountController@clientPage');
Route::get('/examTimetable', 'AccountController@examTimetablePage');
Route::get('/vehicle', 'VehicleController@vehiclePage');
Route::post('/vehicleInfo', 'VehicleController@vehicleInfoPage');
Route::post('/vehicle', 'VehicleController@vehicleCreatePage');
Route::get('/instructor', 'AccountController@instructorPage');
Route::get('/route', 'AccountController@routePage');
Route::get('/trafficIncident', 'AccountController@trafficIncidentPage');
Route::get('/accountsCreate', 'AccountController@accountsPage');
Route::post('/accountsCreate/success', 'AccountController@accountsPageCreate');
Route::post('/accountsCreate/deleted', 'AccountController@accountsPageDelete');
Route::get('/licensePlateRegistration', 'VehicleController@licensePlateRegistrationPage');
Route::get('/clientEditing', 'AccountController@clientDataEditingPage');

// LVL 4
Route::get('/employeeDataEditing', 'AccountController@employeeDataEditingPage');
Route::get('/employeeTimetable', 'AccountController@employeeTimetablePage');
Route::get('/message', 'AccountController@messagePage');
Route::get('/generatedMessage', 'AccountController@messagePage');

// LVL5
Route::get('/timetableMessagePage', 'AccountController@timetableMessagePage');
