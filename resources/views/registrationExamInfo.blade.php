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
            <form action ="" method="post">
                <!--TODO dropdownas pasirinkti,kokio tipo egzaminai bus rodomi ir pagal tą reikšmę rodyti egzaminus tinkamus-->
            </form>
            @if(isset($ok))
                @if($error == true)
                    <div class="alert alert-danger text-left">
                        <span>Tokiu laiku laisvų egzaminų nėra!</span>
                    </div>
                @endif
            @endif
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
                @foreach ($egzaminas as $key)
                    @if(DB::table('egzaminuojamas_klientas')->where([
                                                                       ['FK_klientas', $klientasId],
                                                                       ['FK_egzaminas', $key->id]
                                                                    ])->exists())
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
                                            <select name="egzaminoId">
                                            @foreach ($egzaminas2 as $keys)

                                                    <option value="{{$keys->id }}">{{$keys->data }} || {{ DB::table('kategorija')->where('id', $keys->kategorija)->select('name')->pluck('name')->first() }} || {{$keys->vieta }} ||  {{$keys->tipas }}</option>

                                            @endforeach
                                            </select>
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
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection