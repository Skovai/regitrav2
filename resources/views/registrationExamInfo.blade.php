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
                    @if(DB::table('egzaminuojamas_klientas')->where('FK_klientas', $klientasId)->exists())
                    <tr>
                        <td>{{ $key->data }}</td>
                        <td>{{ $key->pradzia }}</td>
                        <td>{{ $key->vieta }}</td>
                        <td>{{ $key->tipas }}</td>
                        <form method="post" action="{{action('ExamController@registrationToExamDelete')}}">
                            @csrf
                            <td>
                                <input type="hidden" value="{{ $key->id }}" name="id">
                                <button name="difficulty" class="btn btn-danger"
                                        value="3" type="submit">
                                    Atšaukti
                                </button>
                            </td>
                        </form>
                    </tr>
                    @else

                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection