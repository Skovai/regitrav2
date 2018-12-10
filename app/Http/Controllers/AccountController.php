<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Saskaita;
use App\TransportoPriemone;
use App\Klientas;
use App\Egzaminas;
use App\Kategorija;

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
        $egzaminas =  Egzaminas::all();
        return view('registrationExamInfo',compact('egzaminas'));
    }

    public function accountsPage()
    {
        $saskaita =  Saskaita::all();
        $klientas =  Klientas::all();
        return view('accounts',compact('saskaita','klientas'));
    }
    public function accountsPageCreate(Request $request)
    {
        $saskaita =  Saskaita::all();
        $klientas =  Klientas::all();
        $suma = $request->input('suma');
        $paskirtis = $request->input('paskirtis');
        $isdavimo_data = $request->input('isdavimo_data');
        $isdavimo_laikas = $request->input('isdavimo_laikas');
        $terminas = $request->input('terminas');
        $FK_klientas = $request->input('FK_klientas');
        DB::table('saskaita')->insert(
            ['suma' => $suma, 'paskirtis' => $paskirtis, 'isdavimo_data' => $isdavimo_data, 'isdavimo_laikas' => $isdavimo_laikas,
             'terminas' => $terminas, 'darbuotojas_id' => NULL, 'FK_klientas' => $FK_klientas]
        );
        return view('accounts',compact('saskaita', 'klientas'));
    }
    public function accountsPageDelete(Request $request)
    {
        $saskaita =  Saskaita::all();
        $klientas =  Klientas::all();
        $id = $request->input('id');
        DB::table('saskaita')->where('id', '=', $id)->delete();

        return view('accounts',compact('saskaita', 'klientas'));
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
        $kategorija =  Kategorija::all();

        return view('examTimetable',compact('kategorija'));
    }
    public function registrationToExamPage()
    {
        $egzaminas = Egzaminas::all();
        return view('registrationToExam' ,compact('egzaminas'));
    }
    public function instructorPage()
    {
        return view('instructor');
    }
    public function routePage()
    {
        return view('route');
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
