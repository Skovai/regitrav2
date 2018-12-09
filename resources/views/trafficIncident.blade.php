@extends('design')

@section('title', 'Pagrindinis')
@section('content')

    <h1>Eismo įvykiai, kuriuose dalyvavo transporto priemonė</h1>
    
    <div class="panel panel-default">
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th>Eismo įvykio data</th>
                                            <th>Laikas</th>
                                            <th>Vieta</th>
                                            <th>Aprašas</th>
                                            <th>Ar buvo iškviesti pareigūnai</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($eismoIvykis as $key)
                                    <tr>
                                            <td>{{ $key->data }}</td>
                                            <td>{{ $key->laikas }}</td>
                                            <td>{{ $key->vieta }}</td>
                                            <td>{{ $key->aprasas }}</td>
                                            <td>{{ $key->pareigunai }}</td>
                                           
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