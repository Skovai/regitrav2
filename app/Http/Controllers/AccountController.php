<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Saskaita;
use App\Inventorius;
use App\Darbuotojas;
use App\TransportoPriemone;

use Illuminate\Support\Facades\Schema;

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
        $saskaita =  Saskaita::all();
        return view('accounts',compact('saskaita'));
    }
    public function accountsPageCreate(Request $request)
    {
        $saskaita =  Saskaita::all();
        $suma = $request->input('suma');
        $paskirtis = $request->input('paskirtis');
        $isdavimo_data = $request->input('isdavimo_data');
        $isdavimo_laikas = $request->input('isdavimo_laikas');
        $terminas = $request->input('terminas');
        DB::table('saskaita')->insert(
            ['suma' => $suma, 'paskirtis' => $paskirtis, 'isdavimo_data' => $isdavimo_data, 'isdavimo_laikas' => $isdavimo_laikas, 'terminas' => $terminas, 'darbuotojas_id' => 1]
        );
        return view('accounts',compact('saskaita'));
    }
    public function accountsPageDelete(Request $request)
    {
        $saskaita =  Saskaita::all();
        $id = $request->input('id');
        DB::table('saskaita')->where('id', '=', $id)->delete();

        return view('accounts',compact('saskaita'));
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
        $inventory =  Inventorius::all();
        $worker =  Darbuotojas::all();
        return view('inventory',compact('inventory','worker'));
    }
    public function inventoryPageCreate(Request $request)
    {
        $inventory =  Inventorius::all();
        $worker =  Darbuotojas::all();
        $pav = $request->input('pav');
        $serija = $request->input('serija');
        $darbuotojas = $request->input('darbuotojas');
        DB::table('inventorius')->insert(
            ['pavadinimas' => $pav, 'serijos_numeris' => $serija, 'darbuotojas_id' => $darbuotojas]
        );
        return view('inventory',compact('inventory','worker'));
    }
    public function inventoryPageDelete(Request $request)
    {
        $inventory =  Inventorius::all();
        $worker =  Darbuotojas::all();
        $id = $request->input('id');
        DB::table('inventorius')->where('id', '=', $id)->delete();
        return view('inventory',compact('inventory','worker'));
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
    public function clientDataEditingPage()
    {
        return view('clientDataEditing');
    }
    public function login(Request $request)
    {
        $this->validate($request, [

        ]);
    }

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
