@extends('design')

@section('title', 'Pagrindinis')
@section('content')
<?php if(Auth::check()){$id = Auth::user()->getAuthIdentifier();}?>
    @auth
        <ul>
            <h1><a href="{{action('ClientController@getMessages')}}">🕭</a></h1>
            <h1>Pagrindinis langas</h1>
            @if(DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
            <li><a href="{{action('AccountController@adminFunctionPage')}}">Administratoriaus funkcijų langas</a></li>
            @endif
            @if(DB::table('klientas')->where('FK_Pirisijungimo_id', '=', $id)->exists() or
                DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
            <li><a href="{{action('AccountController@registrationExamInfoPage')}}">Egzaminų, į kuriuos yra užsiregistravęs,🕭 langas</a></li>
            <li><a href="{{action('AccountController@registrationToExamPage')}}">Registracijos į egzaminą langas</a></li>
            <li><a href="{{action('VehicleController@vehiclePage')}}">Transporto priemonių langas</a></li>
            <li><a href="{{action('AccountController@accountsPage')}}">Sąskaitų langas</a></li>
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