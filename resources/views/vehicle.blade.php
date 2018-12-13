@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Transporto priemonės langas</h1>
    
    <?php

    $transportoPriemoneTable = DB::table('transporto_priemone')->where('id' ,'>' ,0)->select('id')->pluck('id')->reverse()->toArray();

    ?>
        <form method="post" action="{{action('VehicleController@licensePlateRegistrationPage')}}">
            @csrf
            <button type="submit" style="width:210px">Registruoti transporto priemonę</button>
        </form>
    
        @if($errorMessage!=null)
        <div style="color:red"><b>{{ $errorMessage }}</b></div>
        @else
        <br>
        @endif
            
    
        <button type="button"  data-toggle="modal" data-target="#myModal" style="width:210px">Ieškoti TP valstybinio nr.</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Transporto priemonės paieška</h4>
                    </div>
                    <div class="modal-body">
                        <form method='post' action="{{action('VehicleController@vehicleInfoPage')}}">
                            @csrf
                        <input type="text" name="valstybinisNr" id="valstybinisNr" placeholder="Įveskite valstybinį nr.">
                        <input type='submit' name='ok' value='Ieškoti'>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Atšaukti</button>
                    </div>
                </div>

            </div>
        </div>

        <br>
        <br>
        
        <div class="panel panel-default">
                <div class="panel-heading">Transporto priemonių sąrašas</div>
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Valstybinis nr.</th>
                                            <th>Markė</th>
                                            <th>Modelis</th>
                                            <th>Kategorija</th>
                                            <th>Savininkas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transportoPriemone as $key)
                                    <tr>
                                            <td>{{ $key->valstybinisNr }}</td>
                                            <td>{{ $key->marke }}</td>
                                            <td>{{ $key->modelis }}</td>
                                            <td>{{ DB::table('kategorija')->where('id','=',$key->kategorija)->first()->name }} </td>    
                                            <td>{{ DB::table('klientas')->where('id','=',$key->FK_Klientas)->first()->vardas }} 
                                                {{ DB::table('klientas')->where('id','=',$key->FK_Klientas)->first()->pavarde }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>

            </div>
    </div>

@endsection
