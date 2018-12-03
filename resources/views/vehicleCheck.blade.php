@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Techninės apžiūros istorija</h1>
    
    <div class="panel panel-default">
                <div class="panel-heading">Transporto priemonių sąrašas</div>
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Atlikimo data</th>
                                            <th>Galioja iki</th>
                                            <th>Kaina</th>
                                            <th>Ar praeita</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($technineApziura as $key)
                                    <tr>
                                            <td>{{ $key->atlikimoData }}</td>
                                            <td>{{ $key->galiojimoData }}</td>
                                            <td>{{ $key->kaina }}</td>
                                            <td>{{ $key->arPraeita }}</td>
                                           
<!--                                            <form method="post" action="{{action('AccountController@accountsPageDelete')}}">
                                                    @csrf
                                                    <td>
                                                            <input type="hidden" value="{{ $key->id }}" name="id">
                                                            <button name="difficulty" class="btn btn-danger"
                                                                    value="3" type="submit">
                                                                    X
                                                            </button>
                                                    </td>
                                            </form>-->
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
            </div>
    </div>
    <li><a href="{{action('TrafficIncidentController@trafficIncidentPage')}}">Susiję eismo įvykiai</a></li>

@endsection