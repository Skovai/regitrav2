@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Inventoriaus langas</h1>
    <ul>
        <li><a href="{{action('AccountController@employeeDataEditingPage')}}">Pranešimas</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">Registruoti inventorių</div>
        <div class="panel-body">
            <form method="post" action="{{action('EmployeeController@inventoryCreate')}}">
                @csrf
                <label for="darbuotojas">Darbuotojas</label>
                <select name="darbuotojas" id="darbuotojas">
                    @foreach($darbuotojas as $key)
                        <option value="{{$key->id}}">{{$key->asmens_kodas}} || {{$key->vardas}} {{$key->pavarde}}</option>
                    @endforeach
                </select>

                <label for="inventorius">Inventorius</label>
                <select name="inventorius" id="inventorius">
                    @foreach($inventorius as $key)
                        <option value="{{$key->id}}">{{$key->serijos_numeris}} || {{$key->pavadinimas}}</option>
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
        <div class="panel-heading">Inventoriaus sąrašas</div>
        <div class="panel-body">
            <form action ="" method="post">
                <!--TODO dropdownas pasirinkti,kokio tipo egzaminai bus rodomi ir pagal tą reikšmę rodyti egzaminus tinkamus-->
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>Pavadinimas</th>
                    <th>Serijos numeris</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inventorius as $key)
                        <tr>
                            <td>{{ $key->pavadinimas }}</td>
                            <td>{{ DB::table('darbuotojas')->where('id', $key->darbuotojas_id)->select('vardas')->pluck('vardas')->first()}} {{ DB::table('darbuotojas')->where('id', $key->darbuotojas_id)->select('pavarde')->pluck('pavarde')->first()}}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection