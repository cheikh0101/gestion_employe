@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Modifier les informations de l'employé
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form action=" {{ route('admin.membre.update', compact('membre')) }} " method="post">
                            @csrf
                            @method('put')
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" name="nom" value=" {{ $membre->nom }} " id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Prènom</label>
                                        <input type="text" name="prenom" value=" {{ $membre->prenom }} "
                                            id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">CNI</label>
                                        <input type="number" name="cni" value=" {{ $membre->cni }} " id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Matricule</label>
                                        <input type="text" name="matricule" value=" {{ $membre->matricule }} "
                                            id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lieu de Naissance</label>
                                        <input type="text" name="lieu_naissance"
                                            value=" {{ $membre->lieu_naissance }} " id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Date de naissance</label>
                                        <input type="date" name="date_naissance"
                                            value=" {{ $membre->date_naissance }} " id="" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Téléphone</label>
                                        <input type="number" name="telephone" value=" {{ $membre->telephone }} "
                                            id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value=" {{ $membre->email }} " id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
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
                                                <option value=" {{ $structure->id }} "> {{ $structure->nom }}
                                                </option>
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
                                        Modifier
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
