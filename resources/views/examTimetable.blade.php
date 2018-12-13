@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Egzamino tvarkaraščio sudarymo langas</h1>

    <div class="panel panel-default">
        <div class="panel-heading">Pridėti egzamina</div>
        <div class="panel-body">
            <form method="post" action="{{action('ExamController@examCreate')}}">
                @csrf
                <label for="data">Data</label>
                <input id="data" type="date" name="data">

                <label for="kategorija">Kategorija</label>
                <select id="kategorija" name="kategorija">
                    @foreach ($kategorija as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endforeach
                </select>

                <label for="pradzia">Pradzia</label>
                <input id="pradzia" type="time" name="pradzia">

                <label for="pabaiga">Pabaiga</label>
                <input id="pabaiga" type="time" name="pabaiga">

                <label for="kaina">kaina</label>
                <input id="kaina"type="number" name="kaina">

                <label for="vieta">vieta</label>
                <input id="vieta"type="text" name="vieta">

                <label for="tipas">tipas</label>
                <input id="tipas"type="text" name="tipas">

                <input id="arIslaikyta" type="hidden" name="arIslaikyta" value="0"/>
                <button name="difficulty" class="btn btn-danger" style="width: 80px"
                        value="3" type="submit">
                    Patvirtinti
                </button>
            </form>

            <table class="table">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Laikas</th>
                    <th>Vieta</th>
                    <th>Kategorija</th>
                    <th>Tipas</th>
                </tr>
                </thead>
                <tbody>
                @if($egzaminas->count() > 0)
                    @foreach ($egzaminas as $key)
                        <tr>
                            <td>{{ $key->data }}</td>
                            <td>{{ $key->pradzia }}</td>
                            <td>{{ $key->vieta }}</td>
                            <td>{{ $key->kategorija }}</td>
                            <td>{{ $key->tipas }}</td>
                        </tr>
                    @endforeach
                @else
                    <h3 style="color:red;">Klaida: egzaminų nėra</h3>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection