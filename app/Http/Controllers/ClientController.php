<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Zinute;

class ClientController extends Controller
{

    public function index()
    {
        //
    }
    public function clientUpdate(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();
        $vardas = $request->input('vardas');
        $pavarde = $request->input('pavarde');
        $ak = $request->input('ak');
        $nr = $request->input('nr');
        $miestas = $request->input('miestas');
        $adresas = $request->input('adresas');
        $gimimoData = $request->input('gimimoData');
        $pastas = $request->input('pastas');
        DB::table('klientas')->insert(
            ['vardas' => $vardas, 'pavarde' => $pavarde, 'asmens_kodas' => $ak, 'tel_nr' => $nr, 'miestas' => $miestas , 'adresas' => $adresas
            , 'gimimo_data' => $gimimoData, 'e_pastas' => $pastas , 'FK_Darbuotojas' => NULL, 'FK_Pirisijungimo_id' => $id ]
        );
        return view('main');
    }
    
    public function getMessages(Request $request)
    {
        return view('message');
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
