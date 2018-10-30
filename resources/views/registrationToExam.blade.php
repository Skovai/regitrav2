@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Registracijos į egzaminą langas</h1>
    <ul>
        <li><a href="{{action('AccountController@examTimetablePage')}}">Egzamino tvarkaraščio langas</a></li>
    </ul>

@endsection