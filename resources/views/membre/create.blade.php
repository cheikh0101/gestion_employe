@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Nouveau Employé
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.membre.store') }} " method="post">
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
                                        <label for="">Prenom</label>
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
                                        <label for="">CNI</label>
                                        <input type="number" name="cni" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Matricule</label>
                                        <input type="text" name="matricule" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lieu de Naissance</label>
                                        <input type="text" name="lieu_naissance" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Date de naissance</label>
                                        <input type="date" name="date_naissance" id=""
                                            class="form-control @error('date_naissance') is-invalid @enderror "
                                            placeholder="" aria-describedby="helpId">
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
                                        <label for="">Téléphone</label>
                                        <input type="number" name="telephone" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Sexe</label>
                                        <select class="form-control" name="sexe" id="">
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Structure</label>
                                        <select class="form-control" name="structure_id" id="">
                                            @foreach ($structures as $structure)
                                                <option value=" {{ $structure->id }} "> {{ $structure->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Situation Matrimoniale</label>
                                        <select class="form-control" name="situation_matrimoniale" id="">
                                            <option value="C">Célibataire</option>
                                            <option value="M">Marié</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
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
