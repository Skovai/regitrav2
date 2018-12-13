@extends('design')

@section('title', 'Pagrindinis')
@section('content')
<?php  if(Auth::check()){
                $id = Auth::user()->getAuthIdentifier();
                $klientoId = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
            }?>
    @auth
        <ul>
            <form method="post" action="{{action('ClientController@getMessages')}}">
                @csrf
                <input type="hidden" value="{{ $klientoId }}" name="klientoId">
                <h1><button type="submit" style="color:green; border:none; background:none">🕭({{ DB::table('zinute')->where('FK_KlientasSenas', '=', "$klientoId")->count() }})</button></h1>
            </form>
            <h1>Pagrindinis langas</h1>
            @if(DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
            <li><a href="{{action('AccountController@adminFunctionPage')}}">Administratoriaus funkcijų langas</a></li>
            <li><a href="{{action('VehicleController@vehiclePage')}}">Transporto priemonių langas</a></li>
            <li><a href="{{action('AccountController@accountsPage')}}">Sąskaitų langas</a></li>
            @endif
            @if(DB::table('klientas')->where('FK_Pirisijungimo_id', '=', $id)->exists() or
                DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
            <li><a href="{{action('AccountController@registrationExamInfoPage')}}">Egzaminai, į kuriuos esate užsiregistravę</a></li>
            <li><a href="{{action('AccountController@registrationToExamPage')}}">Registracijos į egzaminą langas</a></li>
            <li><a href="{{action('AccountController@driversLicensePage')}}">Vairuotojo pažymėjimo langas</a></li>
            @else 
            <li><a href="{{url('/clientEditing')}}">Trūksta duomenų, kad galėtumėte naudotis sistema</a></li>
            @endif
        </ul>
        @else
        <h1>Prašome prisijungti</h1>
        <li><a href="{{url('/')}}">Grįžti į pagrinidį</a></li>

    @endauth

@endsection