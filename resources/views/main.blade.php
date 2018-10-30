@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <ul>
        <h1>Pagrindinis langas</h1>
        <li><a href="{{action('AccountController@adminFunctionPage')}}">Administratoriaus funkcijų langas</a></li>
        <li><a href="{{action('AccountController@registrationExamInfoPage')}}">Egzaminų į kuriuos yra užsiregistravęs langas</a></li>
        <li><a href="{{action('AccountController@registrationToExamPage')}}">Registracijos į egzaminą langas</a></li>
        <li><a href="{{action('AccountController@vehicleInfoPage')}}">Transporto priemonių langas</a></li>
        <li><a href="{{action('AccountController@accountsPage')}}">Sąskaitų langas</a></li>
        <li><a href="{{action('AccountController@driversLicensePage')}}">Vairuotojo pažymėjimo langas</a></li>
    </ul>
@endsection