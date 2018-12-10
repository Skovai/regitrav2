@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Registracijos į egzaminą langas</h1>
    <ul>
        <li><a href="{{action('AccountController@examTimetablePage')}}">Egzamino tvarkaraščio langas</a></li>
    </ul>
            <div class="panel panel-default">
                <div class="panel-heading">Pildyti sąskaita</div>
                <div class="panel-body">
                        <form method="post" action="{{action('ExamController@examCreate')}}">
                                @csrf
                        <label for="data">Data</label>
                        <input id="data" type="date" name="data">

                        <label for="pradzia">Pradzia</label>
                        <input id="pradzia" type="time" name="pradzia">

                        <label for="pabaiga">Pabaiga</label>
                        <input id="pabaiga" type="time" name="pabaiga">

                        <label for="kaina">kaina</label>
                        <input id="kaina"type="number" name="kaina">

                        <label for="vieta">vieta</label>
                        <input id="vieta"type="text" name="vieta">

                        <label for="tipas">tipas </label>
                        <input id="tipas"type="text" name="tipas">

                        <input id="arIslaikyta" type="hiden" name="arIslaikyta" value="0">
                        <button name="difficulty" class="btn btn-danger" style="width: 80px"
                                value="3" type="submit">
                                Patvirtinti
                        </button>
                        </form>
                </div>
        </div>

@endsection