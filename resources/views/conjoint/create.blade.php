@extends('layouts.app')

@section('content')
    <form action=" {{ route('dashboard.conjoint.create') }} " method="post">
        @csrf
        <div class="row mt-5">
            <div class="col">
                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" name="nom" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Prénom</label>
                    <input type="text" name="prenom" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Date de naissance</label>
                    <input type="date" name="date_naissance" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="form-group">
                    <label for="">Lieu de Naissance</label>
                    <input type="text" name="lieu_naissance" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Date mariage</label>
                    <input type="date" name="date_mariage" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" name="membre_id" value=" {{ $membre->id }} " id="" class="d-none"
                        placeholder="" aria-describedby="helpId">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-outline-primary btn-block">
                    Enregistrer
                </button>
            </div>
        </div>
    </form>
@endsection
