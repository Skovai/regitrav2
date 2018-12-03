@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Transporto priemonės duomenys</h1>
    
    <div class="panel panel-default">
                <div class="panel-heading">Transporto priemonių sąrašas</div>
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Valstybinis nr.</th>
                                            <th>VIN</th>
                                            <th>Markė</th>
                                            <th>Modelis</th>
                                            <th>Savininkas</th>
                                            <th>Spalva</th>
                                            <th>Kategorija</th>
                                            <th>Galingumas (bhp)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transportoPriemone as $key)
                                    <tr>
                                            <td>{{ $key->valstybinisNr }}</td>
                                            <td>{{ $key->VIN }}</td>
                                            <td>{{ $key->marke }}</td>
                                            <td>{{ $key->modelis }}</td>
                                            <td>{{ $key->FK_Klientas }}</td>
                                            <td>{{ $key->spalva }}</td>
                                            <td>{{ $key->kategorija }}</td>
                                            <td>{{ $key->galingumas }}</td>
                                           
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

@endsection