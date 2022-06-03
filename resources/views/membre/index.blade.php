@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>
                    Liste de mes employés
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-start">
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Recherche">
            </div>
            <div class="col">
                <div class="form-group">
                    <label for=""></label>
                    <select class="custom-select" name="" id="">
                        @foreach ($structures as $structure)
                            <option>
                                {{ $structure->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col d-flex justify-content-end">
                <a href=" {{ route('gestionnaire.membre.create') }} " class="btn btn-primary">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Ajouter un employé
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
                                    Prénom
                                </th>

                                <th>
                                    Nom
                                </th>

                                <th>
                                    Matricule
                                </th>

                                <th colspan="3" class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <div class="d-none">
                                {{ $id = 1 }}
                            </div>

                            @forelse ($membres as $membre)
                                <tr>
                                    <th>
                                        {{ $id++ }}
                                    </th>

                                    <td>
                                        {{ $membre->nom }}
                                    </td>

                                    <td>
                                        {{ $membre->prenom }}
                                    </td>

                                    <td>
                                        {{ $membre->matricule }}
                                    </td>

                                    <td>
                                        <a href=" {{ route('gestionnaire.membre.show', compact('membre')) }} "
                                            class="btn btn-outline-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a href=" {{ route('gestionnaire.membre.edit', compact('membre')) }} "
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <p>
                                    Aucun Membre trouvé
                                </p>
                            @endforelse

                        </tbody>

                        <tfoot class="table-dark">
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Prénom
                                </th>

                                <th>
                                    Nom
                                </th>

                                <th>
                                    Matricule
                                </th>

                                <th colspan="3" class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
