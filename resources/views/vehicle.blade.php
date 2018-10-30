@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Transporto priemonės langas</h1>
    <ul>
        <li><a href="{{action('AccountController@clientDataEditingPage')}}">Sugeneruotas laiškas</a></li>
        <li><a href="{{action('AccountController@messagePage')}}">Valstybinių nr. registracijos langas</a></li>
    </ul>

@endsection