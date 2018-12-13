@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Transporto priemonės duomenys</h1>
    
    <div class="panel panel-default">
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Valstybinis nr.</th>
                                            <th>VIN</th>
                                            <th>Markė</th>
                                            <th>Modelis</th>
                                            <th>Savininkas</th>
                                            <th>Spalva</th>
                                            <th>Kategorija</th>
                                            <th>Galingumas (bhp)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transportoPriemone as $key)
                                    <tr>
                                            <td>{{ $key->valstybinisNr }}</td>
                                            <td>{{ $key->VIN }}</td>
                                            <td>{{ $key->marke }}</td>
                                            <td>{{ $key->modelis }}</td>
                                            <td>{{ DB::table('klientas')->where('id','=',$key->FK_Klientas)->first()->vardas }} 
                                                {{ DB::table('klientas')->where('id','=',$key->FK_Klientas)->first()->pavarde }}</td>
                                            <td>{{ $key->spalva }}</td>
                                            <td>{{ DB::table('kategorija')->where('id','=',$key->kategorija)->first()->name }} </td>
                                            <td>{{ $key->galingumas }}</td>
                                           
<!--                                            <form method="post" action="{{action('AccountController@accountsPageDelete')}}">
                                                    @csrf
                                                    <td>
                                                            <input type="hidden" value="{{ $key->id }}" name="id">
                                                            <button name="difficulty" class="btn btn-danger"
                                                                    value="3" type="submit">
                                                                    X
                                                            </button>
                                                    </td>
                                            </form>-->
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
            </div>
    </div>

    <table>
    <form method="post" action="{{action('VehicleController@vehicleCheckPage')}}">
        @csrf
        <input type="hidden" value="{{ $key->id }}" name="id">
        <button type="submit">Techninės apžiūros istorija</button>
    </form>
    
    <form method="post" action="{{action('TrafficIncidentController@trafficIncidentPage')}}">
        @csrf
        <input type="hidden" value="{{ $key->id }}" name="id">
        <button type="submit">Susiję eismo įvykiai</button>
    </form>
    
    <button type="button"  data-toggle="modal" data-target="#myModal">Keisti valstybinį nr.</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Įveskite naują valstybinį nr.</h4>
                    </div>
                    <div class="modal-body">
                        <form method='post' action="{{action('VehicleController@licensePlateEditPage')}}">
                            @csrf
                        <input type="hidden" value="{{ $key->id }}" name="id">
                        <input type="text" name="valstybinisNr" id="valstybinisNr" placeholder="Įveskite valstybinį nr.">
                        <input type='submit' name='ok' value='Atnaujinti'>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Atšaukti</button>
                    </div>
                </div>

            </div>
        </div>
        
    <form method="post" action="{{action('VehicleController@vehicleChangeOwnerPage')}}">
        @csrf
        <input type="hidden" value="{{ $key->id }}" name="id">
        <button type="submit">Perregistruoti TP</button>
    </form>     
    
    <form method="post" action="{{action('VehicleController@vehicleDeletePage')}}">
        @csrf
        <input type="hidden" value="{{ $key->id }}" name="id">
        <button type="submit">Išregistruoti TP</button>
    </form>
    </table>
    
    <br>
    
<!--<form method="post" action="{{action('VehicleController@vehiclePage')}}">
    @csrf
    <button type="submit">Atgal</button>
</form>    -->
    
@endsection/

