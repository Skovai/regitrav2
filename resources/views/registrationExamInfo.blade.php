@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <?php
    if(Auth::check()){
        $id = Auth::user()->getAuthIdentifier();
        $klientasId = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
    }
    ?>
    <h1>Egzaminų į kuriuos yra užsiregistravęs langas</h1>
    <div class="panel panel-default">
        <div class="panel-heading">Egzaminai, į kuriuos esate užsiregistravęs</div>
        <div class="panel-body">
            @if($error)
                <div class="alert alert-danger text-left">
                    <span>Tokiu laiku laisvų egzaminų nėra!</span>
                </div>
            @endif
            <form action ="" method="post">
                <!--TODO dropdownas pasirinkti,kokio tipo egzaminai bus rodomi ir pagal tą reikšmę rodyti egzaminus tinkamus-->
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Laikas</th>
                    <th>Vieta</th>
                    <th>Tipas</th>
                </tr>
                </thead>
                <tbody>
                @if(DB::table('egzaminuojamas_klientas')->where('FK_klientas', $klientasId)->exists())
                @foreach ($egzaminas as $key)

                    <tr>
                        <td>{{ $key->data }}</td>
                        <td>{{ $key->pradzia }}</td>
                        <td>{{ $key->vieta }}</td>
                        <td>{{ $key->tipas }}</td>
                        <form method="post" action="{{action('ExamController@registrationToExamDelete')}}">
                            @csrf
                            <td>
                                <input type="hidden" value="{{DB::table('egzaminuojamas_klientas')->where('FK_klientas','=', $klientasId)->select('id')->pluck('id')->first()}}" name="id">
                                <button name="difficulty" class="btn btn-danger"
                                        value="3" type="submit">
                                    Atšaukti
                                </button>
                            </td>
                        </form>
                        <td>
                            <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal">Keisti egzamino laiką</button>
                        </td>


                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Pasirinkite naują egzamino laiką</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method='post' action="{{action('ExamController@registeredExamUpdate')}}">
                                                @csrf
                                                <input type="hidden" value="{{ DB::table('egzaminuojamas_klientas')->where('FK_klientas','=', $klientasId)->select('id')->pluck('id')->first() }}" name="klientasid">
                                                <input type="hidden" value="{{$key->id }}" name="egzaminasid">
                                                <input type="hidden" value="{{$key->data }}" name="egzaminasidata">
                                                <input type="hidden" value="{{$key->vieta }}" name="egzaminasivieta">
                                                <input type="hidden" value="{{$key->FK_Klientas }}" name="egzaminasKlientas">
                                                <input type="time" name="pradzia" id="pradzia" placeholder="Įveskite egzamino pradžios laiką">
                                                <input type='submit' name='ok' value='Atnaujinti'>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Atšaukti</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </tr>
                @endforeach
                @else
                    <h3 style="color:red;">Jūs šiuo metu nesate užsiregistravęs į jokį egzaminą</h3>
                @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection