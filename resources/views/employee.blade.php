@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Darbuotojų langas</h1>
    <ul>
        <li><a href="{{action('AccountController@employeeDataEditingPage')}}">Darbuotojo duomenų redagavimo langas</a></li>
        <li><a href="{{action('AccountController@employeeTimetablePage')}}">Darbuotojo tvarkaraščio langas</a></li>
    </ul>
@endsection