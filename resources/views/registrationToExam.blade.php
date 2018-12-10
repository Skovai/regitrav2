@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Registracijos į egzaminą langas</h1>


    <?php

    $egzaminasTable = DB::table('egzaminas')->where('FK_Klientas' ,'<' ,1)->select('id')->pluck('id')->sortBy('data')->toArray();
    $teorijosEgzaminas = DB::table('egzaminas')->where(['tipas', '==', 'teorija'],
                                                        ['FK_Klientas', '<', 1])->select('id')->pluck('id')->sortBy('data')->toArray();
    $praktikosEzgaminas = DB::table('egzaminas')->where(['tipas', '==', 'praktika'],
                                                        ['FK_Klientas', '<', 1])->select('id')->pluck('id')->sortBy('data')->toArray();
    //
    ?>
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



    <div class="panel panel-default">
        <div class="panel-heading">Egzaminai, į kuriuos galite registruotis</div>
        <div class="panel-body">
            <form action ="" method="post">
                <!--TODO dropdownas pasirinkti,kokio tipo egzaminai bus rodomi ir pagal tą reikšmę rodyti egzaminus tinkamus-->
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Laikas</th>
                    <th>Vieta</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($egzaminasTable as $key)
                    <tr>
                        <td>{{ $key->data }}</td>
                        <td>{{ $key->pradzia }}</td>
                        <td>{{ $key->vieta }}</td>
                        <td>  <!--TODO : reikia perduoti kliento, kuris nori užsiregistruoti id (paspaudus mygtuką pasirinktam egzaminui priski
                            riamas kliento id. -->
                            <form method="post" action ="{{action('ExamController@registerToExam')}}">
                                <button type="submit" class="btn btn-success">Registruotis</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection