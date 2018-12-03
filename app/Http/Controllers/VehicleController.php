<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TransportoPriemone;

class VehicleController extends Controller
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
    
    public function vehiclePage()
    {
        $transportoPriemone =  TransportoPriemone::all();
        return view('vehicle',compact('transportoPriemone'));
    }
    
    public function vehicleInfoPage(Request $request)
    {
        $valstybinisNr = $request['valstybinisNr'];
        $transportoPriemone =  TransportoPriemone::all()->where('valstybinisNr', '=', $valstybinisNr); //'LIKE', "%".$valstybinisNr."%")->get();
        //dd(DB::getQueryLog());
        return view('vehicleInfo',compact('transportoPriemone'));
    }
    
    public function vehicleCreatePage(Request $request)
    {
        $transportoPriemone = TransportoPriemone::all();
        $valstybinisNr = $request->input('valstybinisNr');
        $VIN = $request->input('VIN');
        $marke = $request->input('marke');
        $modelis = $request->input('modelis');
        $spalva = $request->input('spalva');
        $galingumas = $request->input('galingumas');
        $FK_Klientas = $request->input('FK_Klientas');
        //$kategorija = $request->input('kategorija');
        DB::table('transporto_priemone')->insert(
            ['valstybinisNr' => $valstybinisNr, 'VIN' => $VIN, 'marke' => $marke, 'modelis' => $modelis, 'spalva' => $spalva, 'galingumas' => $galingumas, 'kategorija' => 1, 'FK_Klientas' => 1]
        );
        return view('vehicle',compact('transportoPriemone'));
    }
    
    public function licensePlateRegistrationPage()
    {
        return view('licensePlateRegistration');
    }
    
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
