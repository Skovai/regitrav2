@extends('design')

@section('title', 'Prisijungimas')
@section('content')
        <h1>Prisijungimo langas</h1>
        <input type="text" placeholder="Vardas">
        <input type="password" placeholder="Slaptažodis">
        <a href="{{action('AccountController@mainPage')}}">Prisijungti</a>
@endsection