@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Nouveau enfant
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.enfant.store') }} " method="post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Prénom</label>
                                        <input type="text" name="prenom" id=""
                                            class="form-control  @error('prenom') is-invalid @enderror" placeholder=""
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
