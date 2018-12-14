@extends('design')

@section('title', 'Pagrindinis')
@section('content')

    <h1>Eismo įvykiai, kuriuose dalyvavo transporto priemonė ID {{ $id }}</h1>
    
    <div class="panel panel-default">
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Eismo įvykio ID numeris</th>
                                            <th>Eismo įvykio data</th>
                                            <th>Laikas</th>
                                            <th>Vieta</th>
                                            <th>Aprašas</th>
                                            <th>Ar buvo iškviesti pareigūnai</th>
                                            <th>Įtraukti daugiau transporto priemonių</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($eismoIvykis as $key)
                                    <tr>
                                            <td>{{ $key->id }}</td>
                                            <td>{{ $key->data }}</td>
                                            <td>{{ $key->laikas }}</td>
                                            <td>{{ $key->vieta }}</td>
                                            <td>{{ $key->aprasas }}</td>
                                            <td>{{ $key->pareigunai }}</td>
                                                
                                                <form method="post" action="{{action('TrafficIncidentController@includeLicensePlate')}}">
                                                    @csrf
                                                    <td>
                                                            <input type="hidden" value="{{ $key->id }}" name="ivykioId">
                                                            <input type="hidden" value="{{ $id }}" name="id">
                                                            <input type="text" name="valstybinisNr" id="valstybinisNr" placeholder="Įveskite valstybinį nr.">
                                                            <input type='submit' name='ok' value='Įtraukti'>
                                                    </td>
                                                </form>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
            </div>
    </div>
    
    <form method="post" action="{{action('TrafficIncidentController@trafficIncidentAddPage')}}">
        @csrf
        <input type="hidden" value="{{ $id }}" name="id">
        <button type="submit">Pridėti eismo įvykio įrašą</button>
    </form>

@endsection