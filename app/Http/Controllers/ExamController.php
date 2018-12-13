<?php

namespace App\Http\Controllers;

use App\EgzaminuojamasKlientas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Egzaminas;
use App\Kategorija;
use App\Marsrutas;
use App\Darbuotojas;
use App\Klientas;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

    public function registrationToExamPage()
    {
        $error = false;
        $message = '';
        $kategorija = Kategorija::all();
        $egzaminas = Egzaminas::all();
        return view('registrationToExam', compact('egzaminas', 'kategorija', 'error', 'message'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function  registeredExamUpdate(Request $request)
    {
       // $id = $request->input('id');
        // $egzaminaLaikantisKlientas =$request->input('egzaminasKlientas');
        $error = false;
        $klientoid = $request->input('klientasid'); //egzaminuojamas_klientas id
        $egzaminoid = $request->input('egzaminasid'); //egzaminuojamas_klientas id
        $egzaminodata = $request->input('egzaminasdata');
        $egzaminovieta = $request->input('egzaminasvieta');
        $egzaminoTipas = $request->input('egzaminastipas');
        $egzaminoKategorija = $request->input('egzaminaskategorija');


        $naujaslaikas = $request->input('pragzia');
        $egzaminasPasirinktuLaiku =DB::table('egzaminas')->where([
                                                                ['pradzia','=', $naujaslaikas],
                                                                ['data', '=', $egzaminodata ],
                                                                ['vieta', '=', $egzaminovieta ],
                                                                ['tipas', '=', $egzaminoTipas ],
                                                                ['kategorija', '=', $egzaminoKategorija ],
                                                                ['FK_Klientas', '=', '1' ], //tinkami tik laisvi egzaminai
        ])->select('id')->pluck('id')->first();
        var_dump($egzaminasPasirinktuLaiku);
       // $count = $egzaminaiPasirinktuLaiku->count();
        if($egzaminasPasirinktuLaiku != 'NULL') //jei tokiu laiku yra laisvų egzaminų
        {
            print_r("as cia");
            print_r($egzaminasPasirinktuLaiku);
            DB::table('egzaminuojamas_klientas')->where([
                ['FK_egzaminas', '=', $egzaminoid],
                ['FK_klientas', '=', $klientoid ]
            ])->update(['FK_egzaminas' => $egzaminasPasirinktuLaiku]);
        } else
        {
            $error = true;
        }
        $egzaminuojamas_klientas = EgzaminuojamasKlientas::All();
        $egzaminas  = DB::table('egzaminuojamas_klientas')->join('egzaminas',
            'egzaminuojamas_klientas.FK_egzaminas', '=','egzaminas.id')
            ->select('egzaminas.*')->get();
        return view('registrationExamInfo', compact('egzaminas', 'egzaminuojamas_klientas', 'error'));
    }
    public function registrationToExamDelete(Request $request)
    {
        $id = $request->input('id');
        //var_dump($id);
        $error = false;
        $egzaminuojamas_klientas = DB::table('egzaminuojamas_klientas')->where('id','=', $id)->delete();
        $egzaminas  = DB::table('egzaminuojamas_klientas')->join('egzaminas',
            'egzaminuojamas_klientas.FK_egzaminas', '=','egzaminas.id')
            ->select('egzaminas.*')->get();
        return view('registrationExamInfo', compact('egzaminas', 'egzaminuojamas_klientas', 'error'));
    }
    public function showExamsByCategory(Request $request)
    {
        $message = '';
        $error = false;
        $kategorija = Kategorija::all();
       // $egzaminas = Egzaminas::all();
        $kategorija_id = $request->input('kategorija');
        $egzaminas =  DB::table('egzaminas')->select('egzaminas.*')
                                    ->where('kategorija','=', $kategorija_id)->get();
        return view('registrationToExam', compact('egzaminas', 'kategorija', 'error', 'message'));
    }
    public function addInstructor(Request $request)
    {
        $darbuotojas = Darbuotojas::all();
        $klientas = Klientas::all();
        $klientas_id = $request->input('klientas');
        $darbuotojas_id = $request->input('darbuotojas');
        DB::table('klientas')->where('id', $klientas_id)->update(['FK_Darbuotojas' => $darbuotojas_id]);
        return view('instructor', compact('darbuotojas', 'klientas'));
    }



    public function routeDelete(Request $request)
    {
        $marsrutas = Marsrutas::all();
        $id = $request->input('id');
        DB::table('marsrutas')->where('id', '=', $id)->delete();
        return view('route',compact('marsrutas'));
    }


    public function routeCreate(Request $request)
    {
        $marsrutas = Marsrutas::all();
        $kelias = $request->input('kelias');
        $laikas = $request->input('laikas');
        $ilgis = $request->input('ilgis');
        DB::table('marsrutas')->insert(
            ['kelias' => $kelias,'laikas' => $laikas, 'ilgis' => $ilgis ]
        );

        return view('route',compact('marsrutas'));
    }

    public function registerToExam(Request $request)
    {
        $error =false;
        $message ='';
        $kategorija = Kategorija::all();
        $egzaminas = Egzaminas::all();
        $id = Auth::user()->getAuthIdentifier();
        $klientasId = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
        $egzaminas_id = $request->input('egzaminas_id');
        //patikrinti ar klientas jau užsiregistravęs į to tipo egzaminą, jei taip - nebeleisti registruotis

        $egzaminas_tipas =$request->input('egzaminas_tipas');
        $egzaminas_kategorija =$request->input('egzaminas_kategorija');

        $arJauUžsiregistravęs = DB::table('egzaminuojamas_klientas')
                                            ->join('egzaminas', 'egzaminuojamas_klientas.FK_egzaminas','=','egzaminas.id')
                                            ->where([
                                                ['egzaminas.tipas', '=',$egzaminas_tipas],
                                                ['egzaminas.kategorija', '=',$egzaminas_kategorija],
                                                ['egzaminuojamas_klientas.FK_klientas','=', $klientasId],
                                            ])->count();

      //  SELECT COUNT(egzaminuojamas_klientas.id) FROM egzaminuojamas_klientas INNER JOIN egzaminas ON egzaminuojamas_klientas.FK_egzaminas = egzaminas.id
       // WHERE egzaminas.tipas = 'praktika' AND egzaminas.kategorija = '15'AND egzaminuojamas_klientas.FK_klientas = '5';

        if($arJauUžsiregistravęs == 0)
        {
            DB::table('egzaminuojamas_klientas')->insert(
                ['FK_klientas' => $klientasId,'FK_egzaminas' => $egzaminas_id ]
            );
            $error=true; //naudojamas parodyti pranešimą,kad registracija pavyko
        } else
        {
            $message = "Klaida: Jūs jau esate užsiregistravęs į tokio tipo ir kategorijos egzaminą";
        }

        return view('registrationToExam',compact('egzaminas', 'kategorija', 'error', 'message'));
    }
    public function examCreate(Request $request)
    {
        $kategorija =  Kategorija::all();
        $kat = $request->input('kategorija');
        $data = $request->input('data');
        $pradzia = $request->input('pradzia');
        $pabaiga = $request->input('pabaiga');
        $kaina = $request->input('kaina');
        $vieta = $request->input('vieta');
        $tipas = $request->input('tipas');
        $arIslaikyta = $request->input('arIslaikyta');
        DB::table('egzaminas')->insert(
            ['kategorija' => $kat,'data' => $data, 'pradzia' => $pradzia, 'pabaiga' => $pabaiga, 'kaina' => $kaina, 'vieta' => $vieta, 'tipas' => $tipas, 'arIslaikyta' => $arIslaikyta, 'FK_Marsrutas'  => 1, 'FK_Klientas' => 1 ]
        );
        $egzaminas = Egzaminas::all();
        return view('examTimetable',compact('egzaminas', 'kategorija'));
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
