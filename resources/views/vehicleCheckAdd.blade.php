@extends('design')

@section('title', 'Pagrindinis')
@section('content')
                <!--TODO tik darbuotojas-->

     <div class="panel panel-default">
                <div class="panel-heading">Pridėti tehninės apžiūros įrašą</div>
                <div class="panel-body">
                        <form method="post" action="{{action('VehicleController@vehicleCheckAdd')}}">
                            @csrf
                            <input type="hidden" value="{{ $TPID }}" name="id">
                            <table>
                            <tr>
                                <td>
                                <label for="atlikimoData">Atlikimo data</label></td>
                                <td>
                                <input id="atlikimoData"type="date" name="atlikimoData"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="galiojimoData">Galioja iki</label></td>
                                <td>
                                <input id="galiojimoData"type="date" name="galiojimoData"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="kaina">Kaina (EUR)</label></td>
                                <td>
                                <input id="kaina"type="float" name="kaina"></td>
                            </tr>
                            <tr>
                                <td>
                                <label for="arPraeita">Ar praeita</label></td>
                                <td>
                                <input id="arPraeita"type="text" name="arPraeita"></td>
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