@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Nom de la structure : {{ $structure->nom }}</h4>

                        <h4 class="card-title">Cigle de la structure : {{ $structure->cigle }}</h4>

                        <h4 class="card-title">Code de la structure : {{ $structure->code }}</h4>

                        <h4 class="card-title">Logo de la structure : {{ $structure->logo }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
