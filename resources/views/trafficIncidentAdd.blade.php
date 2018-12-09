@extends('design')

@section('title', 'Pagrindinis')
@section('content')
     <div class="panel panel-default">
                <div class="panel-heading">Pridėti eismo įvykio įrašą transporto priemonei ID {{ $id }}</div>
                <div class="panel-body">
                        <form method="post" action="{{action('TrafficIncidentController@trafficIncidentAdd')}}">
                            @csrf
                            <input type="hidden" value="{{ $id }}" name="id">
                            <table>
                            <tr>
                                <td>
                                <label for="data">Data</label></td>
                                <td>
                                <input id="data"type="date" name="data"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="laikas">Laikas</label></td>
                                <td>
                                <input id="laikas"type="time" name="laikas"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="vieta">Vieta</label></td>
                                <td>
                                <input id="vieta"type="text" name="vieta"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="aprasas">Aprašas</label></td>
                                <td>
                                <input id="aprasas"type="text" name="aprasas"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="pareigunai">Ar kviesti pareigūnai</label></td>
                                <td>
                                <input id="pareigunai"type="text" name="pareigunai"></td>
                            </tr>
                            </table>
                        <button name="difficulty" class="btn btn-danger" style="width: 80px"
                                value="3" type="submit">
                                Patvirtinti
                        </button>
                    </form>
                </div>
        </div>

@endsection