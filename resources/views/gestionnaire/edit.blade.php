@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Mis à jour du Gestionnaire
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('admin.gestionnaire.update', compact('gestionnaire')) }} " method="post">
                            @csrf
                            @method('put')
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Prénom et Nom</label>
                                        <input type="text" name="name" id=""
                                            value=" {{ $gestionnaire->user->name }} " class="form-control" placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="" class="form-control"
                                            value=" {{ $gestionnaire->user->email }} " placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Confirmer mot de passe</label>
                                        <input type="password" name="password_confirmation" id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
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
