<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App Name - @yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .wrapper {
                display: flex;
                align-items: stretch;
            }

            #sidebar {
                min-width: 250px;
                max-width: 250px;
                min-height: 100vh;
            }

            #sidebar.active {
                margin-left: -250px;
            }
            a[data-toggle="collapse"] {
                position: relative;
            }

            .dropdown-toggle::after {
                display: block;
                position: absolute;
                top: 50%;
                right: 20px;
                transform: translateY(-50%);
            }
            @media (max-width: 768px) {
                #sidebar {
                    margin-left: -250px;
                }
                #sidebar.active {
                    margin-left: 0;
                }
            }
            body {
                font-family: 'Poppins', sans-serif;
                background: #fafafa;
            }

            p {
                font-family: 'Poppins', sans-serif;
                font-size: 1.1em;
                font-weight: 300;
                line-height: 1.7em;
                color: #999;
            }

            a, a:hover, a:focus {
                color: inherit;
                text-decoration: none;
                transition: all 0.3s;
            }

            #sidebar {
                /* don't forget to add all the previously mentioned styles here too */
                background: #7386D5;
                color: #fff;
                transition: all 0.3s;
            }

            #sidebar .sidebar-header {
                padding: 20px;
                background: #6d7fcc;
            }

            #sidebar ul.components {
                padding: 20px 0;
                border-bottom: 1px solid #47748b;
            }

            #sidebar ul p {
                color: #fff;
                padding: 10px;
            }

            #sidebar ul li a {
                padding: 10px;
                font-size: 1.1em;
                display: block;
            }
            #sidebar ul li a:hover {
                color: #7386D5;
                background: #fff;
            }

            #sidebar ul li.active > a, a[aria-expanded="true"] {
                color: #fff;
                background: #6d7fcc;
            }
            ul ul a {
                font-size: 0.9em !important;
                padding-left: 30px !important;
                background: #6d7fcc;
            }
        </style>
        <script>
            $(document).ready(function () {

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });

            });
        </script>
    </head>
    <body>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <?php
    if(Auth::check()){
        $id = Auth::user()->getAuthIdentifier();
        $klientasid = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
        $vardas = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('vardas')->pluck('vardas')->first();
        $pavarde = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('pavarde')->pluck('pavarde')->first();

    }else{
        $id = NULL;
    }

    ?>
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><a href="<?php if(Auth::check()){ echo '/main';}else{ echo '/';} ?>">Regitra V2</a></h3>
                </div>

                <ul class="list-unstyled components">
                    @if(Auth::check())
                    <p>{{$vardas}} {{$pavarde}}</p>
                    @else
                    <p><a href="{{url('/register')}}">Registruotis</a></p>
                    @endif
                    @if(Auth::check() and DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
                    <li class="active">
                        <a href="{{action('AccountController@adminFunctionPage')}}"><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administratoriaus funkcijų langas</a></a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="{{action('AccountController@employeePage')}}">Darbuotojų langas</a></li>
                            <li><a href="{{action('AccountController@inventoryPage')}}">Inventoriaus langas</a></li>
                            <li><a href="{{action('AccountController@clientPage')}}">Klientų langas</a></li>
                            <li><a href="{{action('VehicleController@vehiclePage')}}">Transporto priemonės langas</a></li>
                            <li><a href="{{action('AccountController@instructorPage')}}">Instruktoriaus pasirinkimo langas</a></li>
                            <li><a href="{{action('AccountController@examTimetablePage')}}">Egzaminų tvarkaraščio langas</a></li>
                            <li><a href="{{action('AccountController@routePage')}}">Maršruto sudarymo langas</a></li>
                        </ul>
                    </li>
                        @endif
                        @if(Auth::check() and DB::table('klientas')->where('FK_Pirisijungimo_id', '=', $id)->exists() or
                            DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
                            <li><a href="{{action('AccountController@registrationExamInfoPage')}}">Egzaminai, į kuriuos esate užsiregistravę</a></li>
                            <li><a href="{{action('AccountController@registrationToExamPage')}}">Registracijos į egzaminą langas</a></li>
                            <li><a href="{{action('AccountController@driversLicensePage')}}">Vairuotojo pažymėjimo langas</a></li>
                            <li><a href="{{action('VehicleController@vehiclePage')}}">Transporto priemonių langas</a></li>
                            <li><a href="{{action('AccountController@accountsPage')}}">Sąskaitų langas</a></li>
                        @elseif(Auth::check())
                            <li><a href="{{url('/clientEditing')}}">Trūksta duomenų, kad galėtumėte naudotis sistema</a></li>
                        @endif
                    @auth
                        <li><a href="{{url('/logout')}}">Atsijungti</a></li>
                    @endauth
                </ul>
            </nav>
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="well">
                        @yield('content')
                        </div>
                    </div>
                </nav>
            </div>





        </div>
    </body>
</html>
