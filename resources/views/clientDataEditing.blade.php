@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <?php $id = Auth::user()?>
    <h1>Kliento duomenų redagavimo langas</h1>
    <div class="panel panel-default">
        @if(DB::table('darbuotojas')->where('FK_Pirisijungimo_id', '=', $id)->exists())
        <h1> Jusu duomenis jau yra suvesti </h1>
        @else
        <div class="panel-heading">Atnaujinti duomenis</div>
        <div class="panel-body">
                <form method="post" action="{{action('ClientController@clientUpdate')}}">
                        @csrf
                <label for="vardas">Vardas</label>
                <input id="vardas"type="text" name="vardas">

                <label for="pavarde">Pavardė</label>
                <input id="pavarde"type="text" name="pavarde">

                <label for="ak">Asmens kodas</label>
                <input id="ak" type="number" name="ak">

                <label for="nr">Tel. nr</label>
                <input id="nr"type="text" name="nr">

                <label for="miestas">Miestas</label>
                <input id="miestas" type="text" name="miestas">

                <label for="adresas">Adresas</label>
                <input id="adresas" type="text" name="adresas">
                
                <label for="gimimoData">Gimimo data</label>
                <input id="gimimoData" type="date" name="gimimoData">
                
                <label for="pastas">El. paštas</label>
                <input id="pastas" type="email" name="pastas">

                <button name="difficulty" class="btn" style="width: 80px"
                        value="3" type="submit">
                        Patvirtinti
                </button>
                </form>
        </div>
</div>
@endif

@endsection