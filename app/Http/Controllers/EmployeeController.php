<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Inventorius;
use App\Klientas;
use App\Darbuotojas;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function inventoryCreate(Request $request)
    {
        $inventorius = Inventorius::all();
        $darbuotojas = Darbuotojas::all();
        $id = Auth::user()->getAuthIdentifier();
        $darbuotojas_id =
        $darbuotojas_id = $request->input('darbuotojas');
        $inventorius_id = $request->input('inventorius');
        DB::table('inventorius')->where('id', $inventorius_id)->update(['darbuotojas_id' => $darbuotojas_id]);


        return view('inventory',compact('inventorius','darbuotojas'));
    }
    public function createEmployee(Request $request)
    {
        $klientasId = $request->input('klientas');
        $pareigos = $request->input('pareigos');
        $id = Auth::user()->getAuthIdentifier();
        $inventorius = Inventorius::all();
        $klientas = Klientas::all();
        $darbuotojas = Darbuotojas::all();
        $vardas = DB::table('klientas')->where('id', $klientasId)->select('vardas')->pluck('vardas')->first();
        $pavarde = DB::table('klientas')->where('id', $klientasId)->select('pavarde')->pluck('pavarde')->first();
        $asmens_kodas = DB::table('klientas')->where('id', $klientasId)->select('asmens_kodas')->pluck('asmens_kodas')->first();
        $tel_nr = DB::table('klientas')->where('id', $klientasId)->select('tel_nr')->pluck('tel_nr')->first();
        $miestas = DB::table('klientas')->where('id', $klientasId)->select('miestas')->pluck('miestas')->first();
        $adresas = DB::table('klientas')->where('id', $klientasId)->select('adresas')->pluck('adresas')->first();
        $gimimo_data = DB::table('klientas')->where('id', $klientasId)->select('gimimo_data')->pluck('gimimo_data')->first();
        $e_pastas = DB::table('klientas')->where('id', $klientasId)->select('e_pastas')->pluck('e_pastas')->first();
        DB::table('darbuotojas')->insert(
            ['pareigos' => $pareigos,'vardas' => $vardas, 'pavarde' => $pavarde, 'miestas' => $miestas, 'adresas' => $adresas,
                'telefonas' => $tel_nr, 'e_pastas' => $e_pastas, 'asmens_kodas' => $asmens_kodas, 'gimimo_data' => $gimimo_data, 'FK_Pirisijungimo_id' => $id]
        );


        return view('employeeDataEditing',compact('inventorius', 'klientas','darbuotojas'));
    }
    public function deleteEmployee(Request $request)
    {
        $id = $request->input('id');
        $pareigos = $request->input('pareigos');
        $klientas = Klientas::all();
        $darbuotojas = Darbuotojas::all();
        DB::table('darbuotojas')->where('id', '=', $id)->delete();
        return view('employeeDataEditing',compact('klientas','darbuotojas'));
    }
    public function updateEmployee(Request $request)
    {
        $id = $request->input('darbuotojas');
        $pareigos = $request->input('pareigos');
        if(isset($pareigos)){
            DB::table('darbuotojas')->where('id', $id)->update(['pareigos' => $pareigos]);
        }
        $pavarde = $request->input('pavarde');
        if(isset($pavarde)){
            DB::table('darbuotojas')->where('id', $id)->update(['pavarde' => $pavarde]);
        }
        $vardas = $request->input('vardas');
        if(isset($vardas)){
            DB::table('darbuotojas')->where('id', $id)->update(['vardas' => $vardas]);
        }
        $ak = $request->input('ak');
        if(isset($ak)){
            DB::table('darbuotojas')->where('id', $id)->update(['asmens_kodas' => $ak]);
        }
        $nr = $request->input('nr');
        if(isset($nr)){
            DB::table('darbuotojas')->where('id', $id)->update(['telefonas' => $nr]);
        }
        $adresas = $request->input('adresas');
        if(isset($adresas)){
            DB::table('darbuotojas')->where('id', $id)->update(['adresas' => $adresas]);
        }
        $gimimoData = $request->input('gimimoData');
        if(isset($gimimoData)){
            DB::table('darbuotojas')->where('id', $id)->update(['gimimo_data' => $gimimoData]);
        }
        $klientas = Klientas::all();
        $darbuotojas = Darbuotojas::all();
        return view('employeeDataEditing',compact('klientas','darbuotojas'));
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
