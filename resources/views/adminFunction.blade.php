@extends('design')

@section('title', 'Administratoriaus pultas')
@section('content')
    <h1>Administratoriaus funkcijų langas</h1>
    <ul>
    <li><a href="{{action('AccountController@employeePage')}}">Darbuotojų langas</a></li>
    <li><a href="{{action('AccountController@inventoryPage')}}">Inventoriaus langas</a></li>
    <li><a href="{{action('AccountController@clientPage')}}">Klientų langas</a></li>
    <li><a href="{{action('VehicleController@vehiclePage')}}">Transporto priemonės langas</a></li>
    <li><a href="{{action('AccountController@instructorPage')}}">Instruktoriaus pasirinkimo langas</a></li>
    <li><a href="{{action('AccountController@examTimetablePage')}}">Egzaminų tvarkaraščio langas</a></li>
    <li><a href="{{action('AccountController@routePage')}}">Maršruto sudarymo langas</a></li>
    <li><a href="{{action('AccountController@trafficIncidentPage')}}">Eismo įvykių langas</a></li>
    </ul>
@endsection