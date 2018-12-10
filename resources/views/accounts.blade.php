@extends('design')


@section('title', 'Pagrindinis')
@section('content')
    <?php

    $saskaitaTable = DB::table('saskaita')->where('id' ,'>' ,0)->select('id')->pluck('id')->reverse()->toArray();
    if(Auth::check()){$id = Auth::user()->getAuthIdentifier();}
    ?>
    @if(DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
        <h1>Sąskaitų langas</h1>
        <div class="panel panel-default">
                <div class="panel-heading">Pildyti sąskaita</div>
                <div class="panel-body">
                        <form method="post" action="{{action('AccountController@accountsPageCreate')}}">
                                @csrf
                        <label for="suma">Suma(Eu)</label>
                        <input id="suma"type="number" name="suma">

                        <label for="paskirtis">Paskirtis</label>
                        <input id="paskirtis"type="text" name="paskirtis">

                        <label for="isdavimo_data">Išdavimo Data</label>
                        <input id="isdavimo_data"type="date" name="isdavimo_data">

                        <label for="isdavimo_laikas">Išdavimo laikas</label>
                        <input id="isdavimo_laikas"type="time" name="isdavimo_laikas">

                        <label for="terminas">Terminas</label>
                        <input id="terminas"type="date" name="terminas">
                         
                        <select name="FK_klientas">
                        @foreach ($klientas as $key)
                        <option value="{{ $key->id }}">{{ $key->asmens_kodas }}|| {{ $key->vardas }} {{ $key->pavarde }}</option>
                        @endforeach
                        </select>

                        <button name="difficulty" class="btn btn-danger" style="width: 80px"
                                value="3" type="submit">
                                Patvirtinti
                        </button>
                        </form>
                </div>
        </div>
    <div class="panel panel-default">
            <div class="panel-heading">Saskaitu peržiūra</div>
            <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Suma</th>
                                            <th>Paskirtis</th>
                                            <th>Terminas</th>
                                            <th>Atšaukti</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($saskaita as $key)
                                    <tr>
                                            <td>{{ $key->suma }}</td>
                                            <td>{{ $key->paskirtis }}</td>
                                            <td>{{ $key->terminas }}</td>
                                            <form method="post" action="{{action('AccountController@accountsPageDelete')}}">
                                                    @csrf
                                                    <td>
                                                            <input type="hidden" value="{{ $key->id }}" name="id">
                                                            <button name="difficulty" class="btn btn-danger"
                                                                    value="3" type="submit">
                                                                    X
                                                            </button>
                                                    </td>
                                            </form>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>

            </div>
    </div>
    @else
    <div class="panel panel-default">
                <div class="panel-heading">Saskaitu peržiūra</div>
                <div class="panel-body">
                                <table class="table">
                                        <thead>
                                        <tr>
                                                <th>Suma</th>
                                                <th>Paskirtis</th>
                                                <th>Terminas</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($saskaita as $key)
                                        @if(DB::table('saskaita')->where('FK_klientas', '=', $id)->exists())

                                        <tr>
                                                <td>{{ $key->suma }}</td>
                                                <td>{{ $key->paskirtis }}</td>
                                                <td>{{ $key->terminas }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        </tbody>
                                </table>
    
                </div>
        </div>
        @endif

@endsection