@extends('design')


@section('title', 'Pagrindinis')
@section('content')
    <?php

    $saskaitaTable = DB::table('saskaita')->where('id' ,'>' ,0)->select('id')->pluck('id')->reverse()->toArray();

    ?>
        <h1>Sąskaitų langas</h1>

        <div class="panel panel-default">
                <div class="panel-heading">Pildyti sąskaita</div>
                <div class="panel-body">
                        <form method="post" action="{{action('AccountController@accountsPageCreate')}}">

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
                    @for($i = 1; $i <= count($saskaitaTable); $i++)
                        <table>
                                <h1 class="text-center">{{DB::table('saskaita')->where('id', $i)->select('name')->pluck('name')->first()}}</h1>

                        </table>
                    @endfor
            </div>
    </div>

@endsection