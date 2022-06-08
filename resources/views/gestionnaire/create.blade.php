@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Nouveau Gestionnaire
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.gestionnaire.store') }} " method="post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Prénom et Nom</label>
                                        <input type="text" name="name" id=""
                                            class="form-control @error('name') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('name')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('name') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id=""
                                            class="form-control @error('email') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('email')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('email') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id=""
                                            class="form-control @error('password') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('password')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('password') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Confirmer mot de passe</label>
                                        <input type="password" name="password_confirmation" id=""
                                            class="form-control @error('password_confirmation') is-invalid @enderror "
                                            placeholder="" aria-describedby="helpId">
                                        @error('password_confirmation')
                                            <small id="helpId" class="form-text text-muted">
                                                {{ $errors->first('password_confirmation') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Structure</label>
                                        <select class="form-control @error('structure_id') is-invalid @enderror "
                                            name="structure_id" id="">
                                            @foreach ($structures as $structure)
                                                <option value=" {{ $structure->id }} "> {{ $structure->nom }} </option>
                                            @endforeach
                                        </select>
                                        @error('structure_id')
                                            <small id="helpId" class="form-text text-muted">
                                                {{ $errors->first('structure_id') }}
                                            </small>
                                        @enderror
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
