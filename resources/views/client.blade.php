@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Klientų langas</h1>
    <ul>
        <li><a href="{{action('AccountController@clientDataEditingPage')}}">Kliento duomenų redagavimo langas</a></li>
        <li><a href="{{action('AccountController@accountsPage')}}">Sąskaitų langas</a></li>
    </ul>

@endsection