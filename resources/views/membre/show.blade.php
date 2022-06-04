@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Informations de l'employé
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Prenom: {{ $membre->prenom }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Nom: {{ $membre->nom }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">CNI: {{ $membre->cni }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Matricule: {{ $membre->matricule }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Lieu de naissance: {{ $membre->lieu_naissance }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Date de naissance: {{ $membre->date_naissance }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Téléphone: {{ $membre->telephone }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Email: {{ $membre->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Sexe: {{ $membre->sexe }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Situation matrimoniale:
                                                {{ $membre->situation_matrimoniale }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Nom de la structure: {{ $membre->structure->nom }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($membre->situation_matrimoniale == 'C')
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Enfant(s)
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row mt-2">
                                <div class="col d-flex justify-content-end">
                                    <a href=" {{ route('dashboard.enfant.create') }} " class="btn btn-primary">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Ajouter un enfant
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>

                                                    <th>
                                                        Prénom et Nom
                                                    </th>

                                                    <th>
                                                        Date de naissance
                                                    </th>

                                                    <th>
                                                        Prénom du père
                                                    </th>
                                                    <th>
                                                        Prénom et nom de la mère
                                                    </th>

                                                    <th colspan="2" class="text-center">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <div class="d-none">
                                                    {{ $id = 1 }}
                                                </div>

                                                @forelse ($membre->enfants as $enfant)
                                                    <tr>
                                                        <th>
                                                            {{ $i }}
                                                        </th>
                                                        <th>
                                                            {{ $enfant->prenom }} {{ $enfant->membre->nom }}
                                                        </th>
                                                        <td>
                                                            {{ $enfant->date_naissance }}
                                                        </td>
                                                        <td>
                                                            {{ $enfant->membre->prenom }}
                                                        </td>
                                                        <td>
                                                            {{ $enfant->conjoint->prenom }}
                                                            {{ $enfant->conjoint->nom }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>
                                                        Aucun enfant
                                                    </p>
                                                @endforelse
                                            </tbody>
                                            <tfoot class="table-dark">
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>

                                                    <th>
                                                        Prénom et Nom
                                                    </th>

                                                    <th>
                                                        Date de naissance
                                                    </th>

                                                    <th>
                                                        Prénom du père
                                                    </th>
                                                    <th>
                                                        Prénom et nom de la mère
                                                    </th>

                                                    <th colspan="2" class="text-center">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                                Épouses
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row mt-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href=" {{ route('dashboard.conjoint.create') }} " class="btn btn-primary">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            Ajouter une épouse
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Lieu de naissance
                                                        </th>
                                                        <th>
                                                            Date de mariage
                                                        </th>
                                                        <th>
                                                            Téléphone
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div class="d-none">
                                                        {{ $id = 1 }}
                                                    </div>

                                                    @forelse ($membre->conjoints as $conjoint)
                                                        <tr>
                                                            <th>
                                                                {{ $i }}
                                                            </th>
                                                            <th>
                                                                {{ $conjoint->prenom }} {{ $conjoint->nom }}
                                                            </th>
                                                            <td>
                                                                {{ $conjoint->date_naissance }}
                                                            </td>
                                                            <td>
                                                                {{ $conjoint->lieu_naissance }}
                                                            </td>
                                                            <td>
                                                                {{ $conjoint->date_mariage }}
                                                            </td>
                                                            <td>
                                                                {{ $conjoint->telephone }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>
                                                            Aucune épouse
                                                        </p>
                                                    @endforelse
                                                </tbody>
                                                <tfoot class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Lieu de naissance
                                                        </th>
                                                        <th>
                                                            Date de mariage
                                                        </th>
                                                        <th>
                                                            Téléphone
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Enfant(s)
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row mt-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href=" {{ route('dashboard.enfant.create') }} " class="btn btn-primary">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            Ajouter un enfant
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Prénom du père
                                                        </th>
                                                        <th>
                                                            Prénom et nom de la mère
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div class="d-none">
                                                        {{ $id = 1 }}
                                                    </div>

                                                    @forelse ($membre->enfants as $enfant)
                                                        <tr>
                                                            <th>
                                                                {{ $i }}
                                                            </th>
                                                            <th>
                                                                {{ $enfant->prenom }} {{ $enfant->membre->nom }}
                                                            </th>
                                                            <td>
                                                                {{ $enfant->date_naissance }}
                                                            </td>
                                                            <td>
                                                                {{ $enfant->membre->prenom }}
                                                            </td>
                                                            <td>
                                                                {{ $enfant->conjoint->prenom }}
                                                                {{ $enfant->conjoint->nom }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>
                                                            Aucun enfant
                                                        </p>
                                                    @endforelse
                                                </tbody>
                                                <tfoot class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Prénom du père
                                                        </th>
                                                        <th>
                                                            Prénom et nom de la mère
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Époux
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row mt-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href=" {{ route('dashboard.conjoint.create') }} " class="btn btn-primary">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            Ajouter un époux
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Lieu de naissance
                                                        </th>
                                                        <th>
                                                            Date de mariage
                                                        </th>
                                                        <th>
                                                            Téléphone
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div class="d-none">
                                                        {{ $id = 1 }}
                                                    </div>

                                                    @forelse ($membre->conjoints as $conjoint)
                                                        <tr>
                                                            <th>
                                                                {{ $i }}
                                                            </th>
                                                            <th>
                                                                {{ $conjoint->prenom }} {{ $conjoint->nom }}
                                                            </th>
                                                            <td>
                                                                {{ $conjoint->date_naissance }}
                                                            </td>
                                                            <td>
                                                                {{ $conjoint->lieu_naissance }}
                                                            </td>
                                                            <td>
                                                                {{ $conjoint->date_mariage }}
                                                            </td>
                                                            <td>
                                                                {{ $conjoint->telephone }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>
                                                            Aucune épouse
                                                        </p>
                                                    @endforelse
                                                </tbody>
                                                <tfoot class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Lieu de naissance
                                                        </th>
                                                        <th>
                                                            Date de mariage
                                                        </th>
                                                        <th>
                                                            Téléphone
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Enfant(s)
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row mt-2">
                                    <div class="col d-flex justify-content-end">
                                        <a href=" {{ route('dashboard.enfant.create') }} " class="btn btn-primary">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            Ajouter un enfant
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Prénom du père
                                                        </th>
                                                        <th>
                                                            Prénom et nom de la mère
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div class="d-none">
                                                        {{ $id = 1 }}
                                                    </div>

                                                    @forelse ($membre->enfants as $enfant)
                                                        <tr>
                                                            <th>
                                                                {{ $i }}
                                                            </th>
                                                            <th>
                                                                {{ $enfant->prenom }} {{ $enfant->membre->nom }}
                                                            </th>
                                                            <td>
                                                                {{ $enfant->date_naissance }}
                                                            </td>
                                                            <td>
                                                                {{ $enfant->membre->prenom }}
                                                            </td>
                                                            <td>
                                                                {{ $enfant->conjoint->prenom }}
                                                                {{ $enfant->conjoint->nom }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>
                                                            Aucun enfant
                                                        </p>
                                                    @endforelse
                                                </tbody>
                                                <tfoot class="table-dark">
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>

                                                        <th>
                                                            Prénom et Nom
                                                        </th>

                                                        <th>
                                                            Date de naissance
                                                        </th>

                                                        <th>
                                                            Prénom du père
                                                        </th>
                                                        <th>
                                                            Prénom et nom de la mère
                                                        </th>

                                                        <th colspan="2" class="text-center">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endsection
    </div>
</div>
