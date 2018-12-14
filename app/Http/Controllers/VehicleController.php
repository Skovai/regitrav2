<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TransportoPriemone;
use App\TechnineApziura;
use App\Klientas;
use App\Kategorija;

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
        $errorMessage = "";
        $transportoPriemone =  TransportoPriemone::all();
        return view('vehicle', compact('transportoPriemone', 'errorMessage'));
    }
    
    public function vehicleInfoPage(Request $request)
    {
        $valstybinisNr = $request['valstybinisNr'];
        $transportoPriemone =  TransportoPriemone::all()->where('valstybinisNr', '=', $valstybinisNr); //'LIKE', "%".$valstybinisNr."%")->();
        $count = DB::table('transporto_priemone')->where('valstybinisNr', '=', $valstybinisNr)->count();
        if($count!=0)
        {
            return view('vehicleInfo',compact('transportoPriemone', 'valstybinisNr'));
        }
        else
        {
            $transportoPriemone =  TransportoPriemone::all();
            $errorMessage = "Valstybinis nr. nerastas";
            return view('vehicle', compact('transportoPriemone', 'errorMessage'));
        }
    }
    
    public function vehicleCreatePage(Request $request)
    {
        $errorMessage = "";
        $valstybinisNr = $request->input('valstybinisNr');
        $VIN = $request->input('VIN');
        $marke = $request->input('marke');
        $modelis = $request->input('modelis');
        $spalva = $request->input('spalva');
        $galingumas = $request->input('galingumas');
        $FK_Klientas = $request->input('FK_Klientas');
        $kategorija = $request->input('kategorija');
        $count = DB::table('transporto_priemone')->where('valstybinisNr', '=', $valstybinisNr)->count();
        if($count==0)
        {
            DB::table('transporto_priemone')->insert(
                ['valstybinisNr' => $valstybinisNr, 'VIN' => $VIN, 'marke' => $marke, 'modelis' => $modelis, 'spalva' => $spalva, 'galingumas' => $galingumas, 'kategorija' => $kategorija, 'FK_Klientas' => $FK_Klientas]
            );
        }
        else
        {
            $errorMessage = "Valstybinis nr. jau registruotas";
        }
        $transportoPriemone = TransportoPriemone::all();
        return view('vehicle',compact('transportoPriemone', 'errorMessage'));
    }
    
    public function licensePlateRegistrationPage()
    {
        $kategorija = Kategorija::all();
        $klientas = DB::table('klientas')->orderBy('Pavarde', 'ASC')->get();
        return view('licensePlateRegistration', compact('kategorija', 'klientas'));
    }
    
    public function licensePlateEditPage(Request $request)
    {
        $id = $request->input('id');
        $transportoPriemone =  TransportoPriemone::all()->where('id', '=', $id);
        $valstybinisNr = $request['valstybinisNr'];
        $count = DB::table('transporto_priemone')->where('valstybinisNr', '=', $valstybinisNr)->count();
        if($count==0)
        {
            DB::table('transporto_priemone')->where('id', '=', $id)->update(['valstybinisNr' => $valstybinisNr]);
            $transportoPriemone =  TransportoPriemone::all()->where('id', '=', $id);
            return view('vehicleInfo',compact('transportoPriemone', 'valstybinisNr'));
        }
        else
        {
            return view('vehicleInfo',compact('transportoPriemone', 'valstybinisNr'));
        }
    }
    
    public function vehicleCheckPage(Request $request)
    {
        $id = $request->input('id');
        $technineApziura = TechnineApziura::all()->where('FK_TransportoPriemone', '=', $id);
        return view('vehicleCheck',compact('technineApziura', 'id'));
    }
    
    public function vehicleCheckAddPage(Request $request)
    {
        $TPID = $request->input('id');
        
        return view('vehicleCheckAdd', compact('TPID'));
    }
    
    public function vehicleCheckAdd(Request $request)
    {
        $id = $request->input('id');
        $atlikimoData = $request->input('atlikimoData');
        $galiojimoData = $request->input('galiojimoData');
        $kaina = $request->input('kaina');
        $arPraeita = $request->input('arPraeita');
        DB::table('technine_apziura')->insert(['atlikimoData' => $atlikimoData, 'galiojimoData' => $galiojimoData, 'kaina' => $kaina, 'arPraeita' => $arPraeita, 'FK_TransportoPriemone' => $id]);
        $technineApziura = TechnineApziura::all()->where('FK_TransportoPriemone', '=', $id);
        return view('vehicleCheck',compact('technineApziura', 'id'));
    }
    
    public function vehicleDeletePage(Request $request)
    {
        $id = $request->input('id');
        DB::table('transporto_priemone')->where('id', '=', $id)->delete();
        $transportoPriemone = TransportoPriemone::all();
        return view('vehicle',compact('transportoPriemone'));
    }
    
    public function vehicleChangeOwnerPage(Request $request)
    {
        $naujasSavininkas = "";
        $id = $request->input('id');
        if(($request->input('naujasSavininkas'))!=null)
        {
            $naujasSavininkas = $request->input('naujasSavininkas');
        }
        $klientas = DB::table('klientas')
                ->where('asmens_kodas', 'LIKE', "%".$naujasSavininkas."%")
                ->orWhere('vardas', 'LIKE', "%".$naujasSavininkas."%")
                ->orWhere('pavarde', 'LIKE', "%".$naujasSavininkas."%")->get();
        return view('vehicleChangeOwner',compact('klientas', 'id'));
    }
    
    public function vehicleChangeOwnerSubmit(Request $request)
    {
        $id = $request->input('id'); //TPID
        $naujasSavininkas = $request->input('newClientId');
        $naujoVardas = DB::table('klientas')->where('id', '=', $naujasSavininkas)->first()->vardas;
        $naujoPavarde = DB::table('klientas')->where('id', '=', $naujasSavininkas)->first()->pavarde;
        $senasSavininkas = DB::table('transporto_priemone')->where('id', '=', $id)->first()->FK_Klientas;
        $tpMarke = DB::table('transporto_priemone')->where('id', '=', $id)->first()->marke;
        $tpModelis = DB::table('transporto_priemone')->where('id', '=', $id)->first()->modelis;
        $valstNr = DB::table('transporto_priemone')->where('id', '=', $id)->first()->valstybinisNr;
        DB::table('zinute')->insert(['tipas' => 1, 
                                     'zinute' => "Jūsų automobilis ".$tpMarke." ".$tpModelis.", valstybinis nr. ".$valstNr." yra perregistruojamas naujam savininkui: ".$naujoVardas." ".$naujoPavarde,
                                     'FK_KlientasSenas' => $senasSavininkas, 
                                     'FK_KlientasNaujas' => $naujasSavininkas,
                                     'FK_TransportoPriemone' => $id]);
        $transportoPriemone =  TransportoPriemone::all()->where('id', '=', $id);
        return view('vehicleInfo',compact('transportoPriemone'));
    }
    
    public function vehicleChangeOwnerAccept(Request $request)
    {
        $id = $request->input('id'); // TPID
        $naujasSavininkas = $request->input('newClientId'); // naujo kliento ID
        DB::table('transporto_priemone')->where('id', '=', $id)->update(['FK_Klientas' => $naujasSavininkas]);
        $zinutesId = $request->input('messageId');
        DB::table('zinute')->where('id', '=', $zinutesId)->delete();
        $klientoId = $request->input('clientId');
        $zinute = DB::table('zinute')->where('FK_KlientasSenas', '=', $klientoId)->orWhere('FK_Klientas', '=', $klientoId)->get();
        return view('message',compact('zinute'));
    }
    
    public function vehicleChangeOwnerDecline(Request $request)
    {
        $zinutesId = $request->input('messageId');
        DB::table('zinute')->where('id', '=', $zinutesId)->delete();
        $klientoId = $request->input('clientId');
        $zinute = DB::table('zinute')->where('FK_KlientasSenas', '=', $klientoId)->orWhere('FK_Klientas', '=', $klientoId)->get();
        return view('message',compact('zinute'));
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
