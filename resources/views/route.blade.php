@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Maršruto sudarymo langas</h1>
    <div class="panel panel-default">
        <div class="panel-heading">Registruoti maršrutą</div>
        <div class="panel-body">
            <form method="post" action="{{action('ExamController@routeCreate')}}">
                @csrf
                <label for="kelias">Kelias</label>
                <input id="kelias" type="text" name="kelias">

                <label for="laikas">Laikas</label>
                <input id="laikas" type="time" name="laikas">

                <label for="ilgis">Ilgis</label>
                <input id="ilgis" type="number" name="ilgis">

                <button name="difficulty" class="btn btn-danger" style="width: 80px"
                        value="3" type="submit">
                    Patvirtinti
                </button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Maršruto sąrašas</div>
        <div class="panel-body">
            <form action ="" method="post">
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>Kelias</th>
                    <th>Laikas</th>
                    <th>Ilgis</th>
                    <th>Atšaukti</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($marsrutas as $key)
                    <tr>
                        <td>{{ $key->kelias }}</td>
                        <td>{{ $key->laikas }}</td>
                        <td>{{ $key->ilgis }}</td>
                        <form method="post" action="{{action('ExamController@routeDelete')}}">
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