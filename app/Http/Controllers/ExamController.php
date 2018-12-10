<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Egzaminas;
use App\Kategorija;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

    public function registrationToExamPage()
    {
        $egzaminas = Egzaminas::all();
        return view('registrationToExam', compact('egzaminas'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function registerToExam(Request $request)
    {
        $egzaminas = Egzaminas::all();
        $id = Auth::user()->getAuthIdentifier();
        $klientasId = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
        $egzaminas_id = $request->input('egzaminas_id');
        DB::table('egzaminuojamas_klientas')->insert(
            ['FK_klientas' => $klientasId,'FK_egzaminas' => $egzaminas_id ]
        );

        return view('registrationToExam',compact('egzaminas'));
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
        return view('examTimetable',compact('kategorija'));
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
