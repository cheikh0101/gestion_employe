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
                        <form action=" {{ route('gestionnaire.membre.update', compact('membre')) }} " method="post">
                            @csrf
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
                                        <label for="">Prenom</label>
                                        <input type="text" name="prenom" value=" {{ $membre->prenom }} " id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
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
                                        <input type="text" name="matricule" value=" {{ $membre->matricule }} " id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lieu de Naissance</label>
                                        <input type="text" name="lieu_naissance" value=" {{ $membre->lieu_naissance }} "
                                            id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Date de naissance</label>
                                        <input type="date" name="date_naissance" value=" {{ $membre->date_naissance }} "
                                            id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Téléphone</label>
                                        <input type="number" name="telephone" value=" {{ $membre->telephone }} " id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
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
                                        Modifier
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            @if ($membre->situation_matrimoniale == 'C')
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Ajouter un enfant
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action=" {{ route('gestionnaire.enfant.create') }} " method="post">
                                @csrf
                                <div class="row mt-5">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Prénom</label>
                                            <input type="text" name="prenom" id="" class="form-control" placeholder=""
                                                aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Date de naissance</label>
                                            <input type="date" name="date_naissance" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Prénom de la mère</label>
                                            <input type="text" name="prenom_mere" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="membre_id" value=" {{ $membre->id }} " id=""
                                                class="d-none" placeholder="" aria-describedby="helpId">
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
            @else
                @if ($membre->sexe == 'M')
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Ajouter épouses
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form action=" {{ route('gestionnaire.conjoint.create') }} " method="post">
                                    @csrf
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Nom</label>
                                                <input type="text" name="nom" id="" class="form-control" placeholder=""
                                                    aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Prénom</label>
                                                <input type="text" name="prenom" id="" class="form-control" placeholder=""
                                                    aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Date de naissance</label>
                                                <input type="date" name="date_naissance" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
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
                                                <input type="date" name="date_mariage" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="membre_id" value=" {{ $membre->id }} " id=""
                                                    class="d-none" placeholder="" aria-describedby="helpId">
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

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Ajouter enfants
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form action=" {{ route('gestionnaire.enfant.create') }} " method="post">
                                    @csrf
                                    <div class="row mt-5">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Prénom</label>
                                                <input type="text" name="prenom" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Date de naissance</label>
                                                <input type="date" name="date_naissance" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="membre_id" value=" {{ $membre->id }} " id=""
                                                    class="d-none" placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="conjoint_id" value=" {{ $membre->id }} " id=""
                                                    class="d-none" placeholder="" aria-describedby="helpId">
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
                @else
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Ajouter epoux
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form action=" {{ route('gestionnaire.conjoint.create') }} " method="post">
                                    @csrf
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Nom</label>
                                                <input type="text" name="nom" id="" class="form-control" placeholder=""
                                                    aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Prénom</label>
                                                <input type="text" name="prenom" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Date de naissance</label>
                                                <input type="date" name="date_naissance" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
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
                                                <input type="date" name="date_mariage" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="membre_id" value=" {{ $membre->id }} " id=""
                                                    class="d-none" placeholder="" aria-describedby="helpId">
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

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Ajouter enfants
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form action=" {{ route('gestionnaire.enfant.create') }} " method="post">
                                    @csrf
                                    <div class="row mt-5">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Prénom</label>
                                                <input type="text" name="prenom" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Date de naissance</label>
                                                <input type="date" name="date_naissance" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Prénom de la mère</label>
                                                <input type="text" name="prenom_mere" id="" class="form-control"
                                                    placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="membre_id" value=" {{ $membre->id }} " id=""
                                                    class="d-none" placeholder="" aria-describedby="helpId">
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
                @endif
            @endif
        </div>
    </div>
@endsection
