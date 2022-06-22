@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Editer Structure
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('admin.structure.update', compact('structure')) }} " method="post">
                            @csrf
                            @method('put')
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" name="nom" id="" class="form-control"
                                            value=" {{ $structure->nom }} " aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Code</label>
                                        <input type="text" name="code" id="" class="form-control"
                                            value=" {{ $structure->code }} " aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Cigle</label>
                                        <input type="text" name="cigle" id="" class="form-control"
                                            value=" {{ $structure->cigle }} " aria-describedby="helpId">
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
                                        Mettre à jour
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
