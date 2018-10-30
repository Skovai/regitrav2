@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Darbuotojo tvarkaraščio langas</h1>
    <ul>
        <li><a href="{{action('AccountController@timetableMessagePage')}}">Tvarkaraščio pranešimas</a></li>
    </ul>

@endsection