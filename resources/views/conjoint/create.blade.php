@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Nouveau conjoint
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('admin.conjoint.create') }} " method="post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" name="nom" id=""
                                            class="form-control @error('nom') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('nom')
                                            <small id="helpId" class="form-text text-muted">
                                                {{ $errors->first('nom') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Prénom</label>
                                        <input type="text" name="prenom" id=""
                                            class="form-control @error('prenom') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('prenom')
                                            <small id="helpId" class="form-text text-muted">
                                                {{ $errors->first('prenom') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Date de naissance</label>
                                        <input type="date" name="date_naissance" id=""
                                            class="form-control @error('date_naissance')  @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('date_naissance')
                                            <small id="helpId" class="form-text text-muted">
                                                {{ $errors->first('date_naissance') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lieu de Naissance</label>
                                        <input type="text" name="lieu_naissance" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Date mariage</label>
                                        <input type="date" name="date_mariage" id=""
                                            class="form-control @error('date_mariage') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('date_mariage')
                                            <small id="helpId" class="form-text text-muted">
                                                {{ $errors->first('date_mariage') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Téléphone</label>
                                        <input type="number" name="telephone" id="" class="form-control"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
