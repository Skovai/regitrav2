@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Darbuotojo duomenų redagavimo langas</h1>
    <div class="panel panel-default">
        <div class="panel-heading">Pridėti darbuotojo info</div>
        <div class="panel-body">
            <form method="post" action="{{action('EmployeeController@createEmployee')}}">
                @csrf
                <label for="klientas">Klientas</label>
                <select name="klientas" id="klientas">
                    @foreach($klientas as $key)
                        <option value="{{$key->id}}">{{$key->asmens_kodas}} || {{$key->vardas}} {{$key->pavarde}}</option>
                    @endforeach
                </select>
                <br />
                <label for="pareigos">Pareigos</label>
                <select name="pareigos" id="pareigos">
                    <option value="1">Administratorius</option>
                    <option value="2">Instruktorius</option>
                    <option value="3">Darbuotojas</option>
                </select>
                <br />
                <button name="difficulty" class="btn btn-danger" style="width: 100px"
                        value="3" type="submit">
                    Patvirtinti
                </button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Keisti darbuotojo info</div>
        <div class="panel-body">
            <form method="post" action="{{action('EmployeeController@updateEmployee')}}">
                @csrf
                <label for="darbuotojas">Darbuotojas</label>
                <select name="darbuotojas" id="darbuotojas">
                    @foreach($darbuotojas as $key)
                        <option value="{{$key->id}}">{{$key->asmens_kodas}} || {{$key->vardas}} {{$key->pavarde}}</option>
                    @endforeach
                </select>
                <br />
                <label for="pareigos">Pareigos</label>
                <select name="pareigos" id="pareigos">
                    <option value="1">Administratorius</option>
                    <option value="2">Instruktorius</option>
                    <option value="3">Darbuotojas</option>
                </select>
                <br />
                <label for="vardas">Vardas</label>
                <input id="vardas"type="text" name="vardas">
                <br />
                <label for="pavarde">Pavardė</label>
                <input id="pavarde"type="text" name="pavarde">
                <br />
                <label for="ak">Asmens kodas</label>
                <input id="ak" type="number" name="ak">
                <br />
                <label for="nr">Tel. nr</label>
                <input id="nr"type="text" name="nr">
                <br />
                <label for="adresas">Adresas</label>
                <input id="adresas" type="text" name="adresas">
                <br />
                <label for="gimimoData">Gimimo data</label>
                <input id="gimimoData" type="date" name="gimimoData">
                <br />
                <button name="difficulty" class="btn btn-danger" style="width: 100px"
                        value="3" type="submit">
                    Patvirtinti
                </button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Darbuotojo šalinimas</div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Asmens kodas</th>
                    <th>Vardas</th>
                    <th>Pavarde</th>
                    <th>Pareigos</th>
                    <th>Šalinti</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($darbuotojas as $key)
                    <tr>
                        <td>{{ $key->asmens_kodas }}</td>
                        <td>{{ $key->vardas }}</td>
                        <td>{{ $key->pavarde }}</td>
                        <td>{{ DB::table('pareigos')->where('id', $key->pareigos)->select('name')->pluck('name')->first()}}</td>
                        <td>{{ $key->pareigos }}</td>
                        <form method="post" action="{{action('EmployeeController@deleteEmployee')}}">
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

@endsection