<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TransportoPriemone;
use App\EismoIvykis;
use App\dalyvauja;

class TrafficIncidentController extends Controller
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
    
    public function trafficIncidentPage(Request $request)
    {
        $id = $request->input('id');
        $eismoIvykis = DB::table('eismo_ivykis')->join('dalyvauja', 'eismo_ivykis.id', '=', 'dalyvauja.FK_EismoIvykis' )
                                                ->join('transporto_priemone', 'dalyvauja.FK_TransportoPriemone', '=', 'transporto_priemone.id')
                                                ->select('eismo_ivykis.*')
                                                ->where('transporto_priemone.id', '=', $id)->get();
        return view('trafficIncident',compact('eismoIvykis', 'id'));
    }

    public function trafficIncidentAddPage(Request $request)
    {
        $id = $request->input('id');
        
        return view('trafficIncidentAdd', compact('id'));
    }
    
    public function trafficIncidentAdd(Request $request)
    {
        $id = $request->input('id');
        $data = $request->input('data');
        $laikas = $request->input('laikas');
        $vieta = $request->input('vieta');
        $aprasas = $request->input('aprasas');
        $pareigunai = $request->input('pareigunai');
        $ivykioId = DB::table('eismo_ivykis')->insertGetId(['data' => $data, 'laikas' => $laikas, 'vieta' => $vieta, 'aprasas' => $aprasas, 'pareigunai' => $pareigunai]);
        DB::table('dalyvauja')->insert(['FK_EismoIvykis' => $ivykioId, 'FK_TransportoPriemone' => $id]);
        $eismoIvykis = DB::table('eismo_ivykis')->join('dalyvauja', 'eismo_ivykis.id', '=', 'dalyvauja.FK_EismoIvykis' )
                                                ->join('transporto_priemone', 'dalyvauja.FK_TransportoPriemone', '=', 'transporto_priemone.id')
                                                ->select('eismo_ivykis.*')
                                                ->where('transporto_priemone.id', '=', $id)->get();
        return view('trafficIncident',compact('eismoIvykis', 'id'));
    }
    
    public function includeLicensePlate(Request $request)
    {
        $ivykioId = $request->input('ivykioId');
        $id = $request->input('id');
        $valstybinisNr = $request->input('valstybinisNr');
        $addedTPID = DB::table('transporto_priemone')->select('id')->where('valstybinisNr', '=', $valstybinisNr)->first()->id;
        DB::table('dalyvauja')->insert(['FK_EismoIvykis' => $ivykioId, 'FK_TransportoPriemone' => $addedTPID]);
        $eismoIvykis = DB::table('eismo_ivykis')->join('dalyvauja', 'eismo_ivykis.id', '=', 'dalyvauja.FK_EismoIvykis' )
                                                ->join('transporto_priemone', 'dalyvauja.FK_TransportoPriemone', '=', 'transporto_priemone.id')
                                                ->select('eismo_ivykis.*')
                                                ->where('transporto_priemone.id', '=', $id)->get();
        return view('trafficIncident',compact('eismoIvykis', 'id'));
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
