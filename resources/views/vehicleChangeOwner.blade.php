@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Naujo savininko paieška transporto priemonei ID {{ $id }}</h1>
    
    <?php

    $transportoPriemoneTable = DB::table('klientas')->where('id' ,'>' ,0)->select('id')->pluck('id')->reverse()->toArray();

    ?>
        
        <form method='post' action="{{action('VehicleController@vehicleChangeOwnerPage')}}">
                @csrf
                <input type="hidden" value="{{ $id }}" name="id">   <!-- TPID -->
                <input type="text" name="naujasSavininkas" size="50" id="naujasSavininkas" placeholder="Įveskite naujo savininko vardą / pavardę / asmens kodą">
            <input type='submit' name='ok' value='Ieškoti'>
        </form>

        <div class="panel panel-default">
                <div class="panel-heading">Klientų sąrašas</div>
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Asmens kodas</th>
                                            <th>Vardas</th>
                                            <th>Pavardė</th>
                                            <th>Telefono nr.</th>
                                            <th>Perregistruoti</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($klientas as $key)
                                    <tr>
                                            <td>{{ $key->asmens_kodas }}</td>
                                            <td>{{ $key->vardas }}</td>
                                            <td>{{ $key->pavarde }}</td>
                                            <td>{{ $key->tel_nr }}</td>
<!--                                            <form method="post" action="{{action('VehicleController@vehicleChangeOwner')}}">
                                                    @csrf
                                                    <td>
                                                            <input type="hidden" value="{{ $id }}" name="id">         TPID 
                                                            <input type="hidden" value="{{ $key->id }}" name="clientId">    Kliento ID 
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
