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
        $kategorija = Kategorija::all();
        $egzaminas = Egzaminas::all();
        return view('registrationToExam', compact('egzaminas', 'kategorija'));
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

        $egzaminas  = DB::table('egzaminuojamas_klientas')->join('egzaminas',
            'egzaminuojamas_klientas.FK_egzaminas', '=','egzaminas.id')
            ->select('egzaminas.*')->get();
        $naujaslaikas = $request->input('pragzia');
        $egzaminasPasirinktuLaiku =DB::table('egzaminas')->where([
                                                                ['pradzia','=', $naujaslaikas],
                                                                ['data', '=', $egzaminodata ],
                                                                ['vieta', '=', $egzaminovieta ],
                                                                ['FK_Klientas', '=', '1' ], //tinkami tik laisvi egzaminai
        ])->select('id')->pluck('id')->first();
        var_dump($egzaminasPasirinktuLaiku);
       // $count = $egzaminaiPasirinktuLaiku->count();
        if($egzaminasPasirinktuLaiku!=0) //jei tokiu laiku yra laisvų egzaminų
        {
            DB::table('egzaminuojamas_klientas')->where([
                ['FK_egzaminas', '=', $egzaminoid],
                ['FK_klientas', '=', $klientoid ]
            ])->update(['FK_egzaminas' => $egzaminasPasirinktuLaiku]);
        } else
        {
            $error = true;
        }
        $egzaminuojamas_klientas = EgzaminuojamasKlientas::All();
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
        $kategorija = Kategorija::all();
       // $egzaminas = Egzaminas::all();
        $kategorija_id = $request->input('kategorija');
        $egzaminas =  DB::table('egzaminas')->select('egzaminas.*')
                                    ->where('kategorija','=', $kategorija_id)->get();
        return view('registrationToExam', compact('egzaminas', 'kategorija'));
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
        $kategorija = Kategorija::all();
        $egzaminas = Egzaminas::all();
        $id = Auth::user()->getAuthIdentifier();
        $klientasId = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
        $egzaminas_id = $request->input('egzaminas_id');
        DB::table('egzaminuojamas_klientas')->insert(
            ['FK_klientas' => $klientasId,'FK_egzaminas' => $egzaminas_id ]
        );

        return view('registrationToExam',compact('egzaminas', 'kategorija'));
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
