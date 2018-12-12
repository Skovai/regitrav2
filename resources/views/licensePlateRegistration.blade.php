@extends('design')

@section('title', 'Pagrindinis')
@section('content')
     <div class="panel panel-default">
                <div class="panel-heading">Registruoti transporto priemonę</div>
                <div class="panel-body">
                        <form method="post" action="{{action('VehicleController@vehicleCreatePage')}}">
                            @csrf
                            <table>
                            <tr>
                                <td>
                                <label for="valstybinisNr">Valstybinis Nr.</label></td>
                                <td>
                                <input id="valstybinisNr"type="text" name="valstybinisNr"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="VIN">VIN</label></td>
                                <td>
                                <input id="VIN"type="text" name="VIN"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="marke">Markė</label></td>
                                <td>
                                <input id="marke"type="text" name="marke"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="modelis">Modelis</label></td>
                                <td>
                                <input id="modelis"type="text" name="modelis"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="spalva">Spalva</label></td>
                                <td>
                                <input id="spalva"type="text" name="spalva"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="galingumas">Galingumas(bhp)</label></td>
                                <td>
                                <input id="galingumas"type="float" name="galingumas"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="FK_Klientas">Klientas</label></td>
                                <td>
                                <select name="FK_Klientas">
                                @foreach ($klientas as $key)
                                <option value="{{ $key->id }}">{{ $key->vardas }} {{ $key->pavarde }}, a.k. {{ $key->asmens_kodas }}</option>
                                @endforeach
                                </select>
                            </tr>
                            <tr>
                                <td>
                                <label for="kategorija">Kategorija</label></td>
                                <td>
                                <select name="kategorija">
                                @foreach ($kategorija as $key)
                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                @endforeach
                                </select>
                            </tr>
                            </table>
                        <button name="difficulty" class="btn btn-danger" style="width: 80px"
                                value="3" type="submit">
                                Patvirtinti
                        </button>
                    </form>
                </div>
        </div>

@endsection