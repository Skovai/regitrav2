@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Registracijos į egzaminą langas</h1>


    <?php
    if(Auth::check()){
        $id = Auth::user()->getAuthIdentifier();
        $klientasId = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
    }
    //$egzaminasTable = DB::table('egzaminas')->where('FK_Klientas' ,'<' ,1)->select('id')->pluck('id')->sortBy('data')->toArray();
   // $teorijosEgzaminas = DB::table('egzaminas')->where(['tipas', '==', 'teorija'],
                                                       // ['FK_Klientas', '<', 1])->select('id')->pluck('id')->sortBy('data')->toArray();
    //$praktikosEzgaminas = DB::table('egzaminas')->where(['tipas', '==', 'praktika'],
                                                       // ['FK_Klientas', '<', 1])->select('id')->pluck('id')->sortBy('data')->toArray();
  
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">Egzaminai, į kuriuos galite registruotis</div>
        <div class="panel-body">
            @if($message != '')
                <div class="alert alert-danger text-left">
                    <span>{{$message}}</span>
                </div>
            @endif
            @if($error)
                <div class="alert alert-success text-left">
                    <span>Jūsų registracija sėkminga</span>
                </div>
            @endif
            <form action ="{{action('ExamController@showExamsByCategory')}}" method="post">
              @csrf
                <label for="kategorija" >Kategorija</label>
                <select id="kategorija" name="kategorija">
                    @foreach ($kategorija as $key)
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endforeach
                </select>
                <button name="difficulty" class="btn btn-danger" style="width: 80px"
                        value="3" type="submit">
                    Filtruoti
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
                    <th>Registruotis</th>
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
                        <td>
                            <form method="post"  action ="{{action('ExamController@registerToExam')}}">
                                @csrf
                                <input name="egzaminas_id" type="hidden" value="{{ $key->id }}">
                                <input name="egzaminas_tipas" type="hidden" value="{{ $key->tipas }}">
                                <input name="egzaminas_kategorija" type="hidden" value="{{ $key->kategorija }}">
                                <button type="submit"  class="btn btn-success">Registruotis</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
                      <div class="alert alert-danger text-left">
                          <span>Klaida: tokių egzaminų nėra</span>
                      </div>
                @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection