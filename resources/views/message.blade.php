@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Pranešimai</h1>
    
     <div class="panel panel-default">
                <div class="panel-body">
                            <table class="table">
                                    <thead>
                                    <tr>
                                            <th style="text-align:center">Žinutė</th>
                                            <th></th>
                                            <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($zinute as $key)
                                    <tr>
                                        @if($zinute->tipas=2)
                                            <td>{{ $key->zinute }}</td>
                                            <td>
                                            <form method="post" action="{{action('AccountController@accountsPage')}}">
                                                    @csrf
                                                    
                                                            <input type="hidden" value="{{ $key->id }}" name="id">
                                                            <button name="difficulty" style="background-color:green; color:white; border:none"
                                                                    value="3" type="submit">
                                                                    Patvirtinti
                                                            </button>
                                            </form>
                                            </td>
                                            <td>
                                            <form method="post" action="{{action('AccountController@accountsPage')}}">
                                                    @csrf
                                                            <input type="hidden" value="{{ $key->id }}" name="id">
                                                            <button name="difficulty" style="background-color:red; color:black; border:none"
                                                                    value="3" type="submit">
                                                                    Atšaukti
                                                            </button>
                                                    
                                            </form>
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>

            </div>

@endsection