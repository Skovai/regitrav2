@extends('design')

@section('title', 'Pagrindinis')
@section('content')
    <h1>Inventoriaus langas</h1>
    <ul>
        <li><a href="{{action('AccountController@employeeDataEditingPage')}}">Pranešimas</a></li>
                <div class="panel panel-default">
                <div class="panel-heading">Priskirti invetorių</div>
                <div class="panel-body">
               		<form method="post" action="{{action('AccountController@inventoryPageCreate')}}">
                    @csrf
                        <label for="pav">Pavadinimas</label>
                    	<input id="pav"type="text" name="pav">

                    	<label for="serija">Serijos numeris</label>
                    	<input id="serija" type="number" name="serija">

                    	<label for="darbuotojas">Darbuotojas</label>
                    	<select name="darbuotojas" id="darbuotojas">
                    	@foreach ($worker as $key)
  						<option value="{{ $key->id }}">{{ $key->pareigos }} | {{ $key->vardas }} {{ $key->pavarde }}</option>
  						@endforeach
						</select>
        				

                    	<button name="difficulty" class="btn btn-danger" style="width: 80px" value="3" type="submit">
                                Patvirtinti
                        </button>
                	</form>
                </div>
        		</div>
		<table class="table">
        	<thead>
            	<tr>
                	<th>Pavadinimas</th>
                	<th>Serijos Numeris</th>
                	<th>Darbuotojas</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($inventory as $key)
                <tr>
                    <td>{{ $key->pavadinimas }}</td>
                    <td>{{ $key->serijos_numeris }}</td>
                    <td>{{ $key->darbuotojas_id }}</td>
                    <form method="post" action="{{action('AccountController@inventoryPageDelete')}}">
                    @csrf
                        <td>
                        	<input type="hidden" value="{{ $key->id }}" name="id">
                            <button name="difficulty" class="btn btn-danger"
                             value="3" type="submit">
                             X
                            </button>
                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
     	</table>
    </ul>

@endsection