@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Susieti klientą su instruktorium</h1>
    <div class="panel panel-default">
        <div class="panel-heading">Susieti instruktoriu</div>
        <div class="panel-body">
            <form method="post" action="{{action('ExamController@addInstructor')}}">
                @csrf
                <label for="klientas" >Klientas</label>
                <select id="klientas" name="klientas">
                    @foreach ($klientas as $key)
                        <option value="{{ $key->id }}">{{ $key->asmens_kodas }}|| {{ $key->vardas }} {{ $key->pavarde }}</option>
                    @endforeach
                </select>
                <label for="darbuotojas" >Darbuotojas</label>
                <select id="darbuotojas" name="darbuotojas">
                    @foreach ($darbuotojas as $key)
                        <option value="{{ $key->id }}">{{ $key->pareigos }}|| {{ $key->vardas }} {{ $key->pavarde }}</option>
                    @endforeach
                </select>
                <button name="difficulty" class="btn btn-danger" style="width: 80px"
                        value="3" type="submit">
                    Patvirtinti
                </button>
            </form>
        </div>
    </div>
    <
@endsection