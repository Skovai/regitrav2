@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Inventoriaus langas</h1>
    <ul>
        <li><a href="{{action('AccountController@employeeDataEditingPage')}}">Pranešimas</a></li>
    </ul>

@endsection