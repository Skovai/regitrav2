@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Transporto priemonės langas</h1>
    
    <?php

    $transportoPriemoneTable = DB::table('transporto_priemone')->where('id' ,'>' ,0)->select('id')->pluck('id')->reverse()->toArray();

    ?>
        
        <li><a href="{{action('AccountController@messagePage')}}">Sugeneruotas laiškas</a></li>
        <li><a href="{{action('VehicleController@licensePlateRegistrationPage')}}">Registruoti transporto priemonę</a></li>

        <div class="panel panel-default">
                <div class="panel-heading">Transporto priemonių sąrašas</div>
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Valstybinis nr.</th>
                                            <th>Markė</th>
                                            <th>Modelis</th>
                                            <th>Savininkas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transportoPriemone as $key)
                                    <tr>
                                            <td>{{ $key->valstybinisNr }}</td>
                                            <td>{{ $key->marke }}</td>
                                            <td>{{ $key->modelis }}</td>
                                            <td>{{ $key->FK_Klientas }}</td>
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

@endsection
