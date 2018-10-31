<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    public function mainPage()
    {
        return view('main');
    }
    public function adminFunctionPage()
    {
        return view('adminFunction');
    }
    public function registrationExamInfoPage()
    {
        return view('registrationExamInfo');
    }
    public function registrationToExamPage()
    {
        return view('registrationToExam');
    }
    public function vehicleInfoPage()
    {
        return view('vehicleInfo');
    }
    public function accountsPage()
    {
        return view('accounts');
    }
    public function driversLicensePage()
    {
        return view('driversLicense');
    }
    public function employeePage()
    {
        return view('employee');
    }

    public function employeeDataEditingPage()
    {
        return view('employeeDataEditing');
    }
    public function employeeTimetablePage()
    {
        return view('employeeTimetable');
    }
    public function timetableMessagePage()
    {
        return view('timetableMessage');
    }
    public function inventoryPage()
    {
        return view('inventory');
    }
    public function messagePage()
    {
        return view('message');
    }
    public function clientPage()
    {
        return view('client');
    }
    public function examTimetablePage()
    {
        return view('examTimetable');
    }
    public function vehiclePage()
    {
        return view('vehicle');
    }
    public function instructorPage()
    {
        return view('instructor');
    }
    public function routePage()
    {
        return view('route');
    }
    public function trafficIncidentPage()
    {
        return view('trafficIncident');
    }
    public function licensePlateRegistrationPage()
    {
        return view('licensePlateRegistration');
    }
    public function clientDataEditingPage()
    {
        return view('clientDataEditing');
    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
