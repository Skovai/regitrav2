@extends('design')

@section('title', 'Prisijungimas')
@section('content')
        <h1>Prisijungimo langas Regitra V1</h1>
        <h1>Prisijungimo langas Regitra V0 - pakeista</h1>
        <input type="text" placeholder="Vardas">
        <input type="password" placeholder="Slaptažodis">
        <a href="{{action('AccountController@mainPage')}}">Prisijungti</a>
        <button type="button"  data-toggle="modal" data-target="#myModal">Registracija</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registruotis</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                        <input type="text" name="vardas" id="vardas" placeholder="Vardas">
                        <input type="text" name="pavarde" id="pavarde" placeholder="Pavarde">
                        <input type="text" name="ak" id="ak" placeholder="Ak">
                        <input type="tel" name="numeris" id="numeris" placeholder="Numeris">
                        <input type="text" name="miestas" id="miestas" placeholder="Miestas">
                        <input type="text" name="adresas" id="adresas" placeholder="Adresas">
                        <input type="date" name="data" id="data" placeholder="Data">
                        <input type="email" name="epastas" id="epastas" placeholder="El paštas">
                        <button type="button">Registruotis</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
@endsection