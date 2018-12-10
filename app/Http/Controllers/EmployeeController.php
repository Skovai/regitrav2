<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Inventorius;

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
        $id = Auth::user()->getAuthIdentifier();
        $darbuotojas_id = DB::table('darbuotojas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
        $serijos_numeris = $request->input('serijos_numeris');
        $pavadinimas = $request->input('pavadinimas');
        DB::table('inventorius')->insert(
            ['pavadinimas' => $pavadinimas,'serijos_numeris' => $serijos_numeris, 'darbuotojas_id' => $darbuotojas_id ]
        );

        return view('inventory',compact('inventorius'));
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
