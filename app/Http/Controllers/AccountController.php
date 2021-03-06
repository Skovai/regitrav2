<?php

namespace App\Http\Controllers;
use App\Darbuotojas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Saskaita;
use App\TransportoPriemone;
use App\Klientas;
use App\Egzaminas;
use App\Kategorija;
use App\Inventorius;
use App\Marsrutas;
use App\EgzaminuojamasKlientas;
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
        $error = false;
        $egzaminuojamas_klientas = EgzaminuojamasKlientas::all();
        $egzaminas2 = Egzaminas::all();

        $egzaminas = DB::table('egzaminuojamas_klientas')->join('egzaminas',
            'egzaminuojamas_klientas.FK_egzaminas', '=','egzaminas.id' )
            ->select('egzaminas.*')->get();

            //SELECT * FROM `egzaminuojamas_klientas`
            //INNER JOIN egzaminas ON egzaminuojamas_klientas.FK_egzaminas = egzaminas.id;
        return view('registrationExamInfo',compact('egzaminas', 'egzaminas2', 'egzaminuojamas_klientas', 'error'));
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
      $klientas =  Klientas::all();
      $kategorijos = Kategorija::all();
        return view('driversLicense', compact('klientas', 'kategorijos'));
    }
    public function employeePage()
    {
        return view('employee');
    }
    public function employeeDataEditingPage()
    {
        $darbuotojas = Darbuotojas::all();
        $klientas =  Klientas::all();
        return view('employeeDataEditing',compact('darbuotojas','klientas'));
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
        $inventorius = Inventorius::all();
        $darbuotojas = Darbuotojas::all();
        return view('inventory',compact('inventorius','darbuotojas'));
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
        $egzaminas =  Egzaminas::all();
        return view('examTimetable',compact('egzaminas', 'kategorija' ));
    }
    public function registrationToExamPage()
    {
        $error =false;
        $message = '';
        $kategorija = Kategorija::all();
        $egzaminas = Egzaminas::all();
        return view('registrationToExam' ,compact('egzaminas', 'kategorija', 'error', 'message'));
    }
    public function instructorPage()
    {
        $darbuotojas = Darbuotojas::all();
        $klientas = Klientas::all();
        return view('instructor', compact('darbuotojas', 'klientas'));
    }
    public function routePage()
    {
        $marsrutas =  Marsrutas::all();
        return view('route', compact('marsrutas'));
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
