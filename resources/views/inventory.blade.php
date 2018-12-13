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
                <label for="pavadinimas">pavadinimas</label>
                <input id="pavadinimas"type="text" name="pavadinimas">

                <label for="serijos_numeris">serijos_numeris</label>
                <input id="serijos_numeris"type="number" name="serijos_numeris">

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
                            <td>{{ $key->serijos_numeris }}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection