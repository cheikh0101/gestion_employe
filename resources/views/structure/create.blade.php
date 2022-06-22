@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Nouvelle Structure
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('admin.structure.store') }} " method="post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" name="nom" id=""
                                            class="form-control @error('nom') is-invalid @enderror" placeholder=""
                                            aria-describedby="helpId">
                                        @error('nom')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('nom') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Code</label>
                                        <input type="text" name="code" id=""
                                            class="form-control @error('code') is-invalid @enderror " placeholder=""
                                            aria-describedby="helpId">
                                        @error('code')
                                            <small id="helpId" class="form-text text-muted"> {{ $errors->first('code') }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Cigle</label>
                                        <input type="text" name="cigle" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Logo</label>
                                        <input type="file" name="logo" id="" class="form-control"
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
