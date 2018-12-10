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
Route::post('/registrationToExam/register', 'ExamController@registerToExam');
Route::post('/registrationToExam/create', 'ExamController@examCreate');
Route::get('/vehicleInfo', 'AccountController@vehicleInfoPage');
Route::get('/accounts', 'AccountController@accountsPage');
Route::get('/driversLicense', 'AccountController@driversLicensePage');
// LVL 3
Route::get('/employee', 'AccountController@employeePage');
Route::get('/inventory', 'AccountController@inventoryPage');
Route::post('/inventory/create', 'EmployeeController@inventoryCreate');

Route::get('/client', 'AccountController@clientPage');
Route::get('/examTimetable', 'AccountController@examTimetablePage');
Route::get('/vehicle', 'VehicleController@vehiclePage');
Route::post('/vehicleCheck', 'VehicleController@vehicleCheckPage');
Route::post('/vehicleCheckAdd', 'VehicleController@vehicleCheckAddPage');
Route::post('/vehicleCheckAdd/success', 'VehicleController@vehicleCheckAdd');
Route::post('/vehicleDelete', 'VehicleController@vehicleDeletePage');
Route::post('/vehiclePlateEdit', 'VehicleController@licensePlateEditPage');
Route::post('/vehicleInfo', 'VehicleController@vehicleInfoPage');
Route::post('/vehicle', 'VehicleController@vehicleCreatePage');
Route::get('/instructor', 'AccountController@instructorPage');
Route::get('/route', 'AccountController@routePage');
Route::get('/trafficIncident', 'TrafficIncidentController@trafficIncidentPage');
Route::post('/trafficIncidentAdd', 'TrafficIncidentController@trafficIncidentAddPage');
Route::post('/trafficIncidentAdd/success', 'TrafficIncidentController@trafficIncidentAdd');
Route::post('/trafficIncidentInclude', 'TrafficIncidentController@includeLicensePlate');
Route::get('/accountsCreate', 'AccountController@accountsPage');
Route::post('/accountsCreate/success', 'AccountController@accountsPageCreate');
Route::post('/accountsCreate/deleted', 'AccountController@accountsPageDelete');
Route::get('/licensePlateRegistration', 'VehicleController@licensePlateRegistrationPage');
Route::get('/clientEditing', 'AccountController@clientDataEditingPage');
Route::post('/clientEditing/update', 'ClientController@clientUpdate');

// LVL 4
Route::get('/employeeDataEditing', 'AccountController@employeeDataEditingPage');
Route::get('/employeeTimetable', 'AccountController@employeeTimetablePage');
Route::get('/message', 'AccountController@messagePage');
Route::get('/generatedMessage', 'AccountController@messagePage');

// LVL5
Route::get('/timetableMessagePage', 'AccountController@timetableMessagePage');
// Bonus 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');
