<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vairuotojo_pazymejimas;
use App\Klientas;
use App\Kategorija;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DriversLicenseController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {

      $id = Auth::user()->getAuthIdentifier();
      $isdavimoData = $request->input('isdavimo_data');
      $galiojimoData = $request->input('galiojimo_data');
      $pnr = $request->input('pazymejimo_nr');

      $klientas = $request->input('FK_Klientas');
      DB::table('Vairuotojo_pazymejimas')->insert(
          ['isdavimo_data' => $isdavimoData, 'galiojimo_data' => $galiojimoData, 'pazymejimo_nr' => $pnr, 'FK_klientas' => $id]
      );
      return view('driversLicense');
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
    public function AddCategory(Request $request)
    {
      $klientas = DB::table('klientas')->join('vairuotojo_pazymejimas', 'klientas.id', '=', 'vairuotojo_pazymejimas.FK_Klientas');
      $isdavimoData = $request->input('isdavimo_data');
      $kategorijos = DB::table('kategorija');
      $kategorija = $request->input('kategorija');
      $FK_Vairuotojo_pazymejimas = $request->input('FK_Vairuotojo_pazymejimas');

      DB::table('vairuotojo_kategorija')->insert(
          ['isdavimo_data' => $isdavimoData, 'kategorija' => $kategorija, 'FK_Vairuotojo_pazymejimas' => $FK_Vairuotojo_pazymejimas]
      );
      return view('driversLicense',compact('klientas', 'kategorijos'));
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
    public function update(Request $request)
    {
      $id = Auth::user()->getAuthIdentifier();
      $isdavimoData = $request->input('isdavimo_data');
      $galiojimoData = $request->input('galiojimo_data');
      $pnr = $request->input('pazymejimo_nr');
      $klientasid = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
      DB::table('Vairuotojo_pazymejimas')->where('FK_Klientas', $klientasid)->update(
          ['isdavimo_data' => $isdavimoData, 'galiojimo_data' => $galiojimoData, 'pazymejimo_nr' => $pnr, 'FK_klientas' => $id]
      );
      return view('driversLicense');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $id = Auth::user()->getAuthIdentifier();
      $klientasid = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
            DB::table('Vairuotojo_pazymejimas')->where('FK_Klientas', $klientasid)->delete();
            return view('driversLicense');
    }
}
