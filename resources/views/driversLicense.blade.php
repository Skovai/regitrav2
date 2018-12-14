@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Vairuotojo pažymėjimo langas</h1>
    <?php
    if(Auth::check()){
      $id = Auth::user()->getAuthIdentifier();
      $klientasId = DB::table('klientas')->where('FK_Pirisijungimo_id', $id)->select('id')->pluck('id')->first();
    }?>
    <div class="panel panel-default">
        @if(DB::table('vairuotojo_pazymejimas')->where('FK_Klientas', '=', $id)->exists())

        <h1> Jūsų pažymėjimo nr.: {{$pazymejimo_nr = DB::table('vairuotojo_pazymejimas')->where('FK_Klientas', $id)->select('pazymejimo_nr')->pluck('pazymejimo_nr')->first()}} </h1>

<!------------------------------------------------------------------------------------------------------------------------>


        <form method="post" action="{{action('DriversLicenseController@destroy')}}">
          @csrf
          <label for="difficulty">Pašalinti pažymėjimą</label>
          <button name="difficulty" class="btn" style="width: 80px"
                  value="3" type="submit">
                  Patvirtinti
          </button>
          </form>

<!------------------------------------------------------------------------------------------------------------------------>


          <form method="post" action="{{action('DriversLicenseController@update')}}">
            @csrf
            <label for="isdavimo_data">Išdavimo data</label>
            <input id="isdavimo_data"type="date" name="isdavimo_data">

            <label for="galiojimo_data">Galiojimo data</label>
            <input id="galiojimo_data"type="date" name="galiojimo_data">

            <label for="pazymejimo_nr">pažymėjimo nr.</label>
            <input id="pazymejimo_nr"type="text" name="pazymejimo_nr">

            <label for="difficulty">Atnaujinti pažymėjimą</label>
            <button name="difficulty" class="btn" style="width: 80px"
                    value="3" type="submit">
                    Patvirtinti
            </button>
            </form>

<!------------------------------------------------------------------------------------------------------------------------>

            <div class="panel-heading">Naujos kategorijos priskyrimas</div>
            <div class="panel-body">
                    <form method="post" action="{{action('DriversLicenseController@AddCategory')}}">
                            @csrf
                    <label for="isdavimo_data">Išdavimo data</label>
                    <input id="isdavimo_data"type="date" name="isdavimo_data">

                    <label for="kategorija">Kategorija</label>
                    <select id="kategorija" name="kategorija">
                      @foreach($kategorijos as $key)
                      <option value="{{$key->id}}">{{$key->name}}</option>
                      @endforeach
                    </select>

                    <label for="FK_Vairuotojo_pazymejimas">Klientas</label>
                    <select id="FK_Vairuotojo_pazymejimas" type="text" name="FK_Vairuotojo_pazymejimas">
                      @foreach($klientas as $key)
                      <option value="{{$key->id}}">{{$key->asmens_kodas}} || {{$key->vardas}} {{$key->pavarde}}</option>
                      @endforeach
                    </select>


                    <button name="difficulty" class="btn" style="width: 80px"
                            value="3" type="submit">
                            Patvirtinti
                    </button>



                    </form>
            </div>
        </div>

<!------------------------------------------------------------------------------------------------------------------------>




        @else
        <div class="panel-heading">Naujo pažymėjimo sukūrimas</div>
        <div class="panel-body">
                <form method="post" action="{{action('DriversLicenseController@create')}}">
                        @csrf
                <label for="isdavimo_data">Išdavimo data</label>
                <input id="isdavimo_data"type="date" name="isdavimo_data">

                <label for="galiojimo_data">Galiojimo data</label>
                <input id="galiojimo_data"type="date" name="galiojimo_data">

                <label for="pazymejimo_nr">pažymėjimo nr.</label>
                <input id="pazymejimo_nr"type="text" name="pazymejimo_nr">


                <button name="difficulty" class="btn" style="width: 80px"
                        value="3" type="submit">
                        Patvirtinti
                </button>



                </form>
        </div>
    </div>
    @endif
@endsection
