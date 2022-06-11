@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>
                    Liste de mes gestionnaires
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-start">
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Recherche">
            </div>
            <div class="col d-flex justify-content-end">
                <a href=" {{ route('dashboard.gestionnaire.create') }} " class="btn btn-primary">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Ajouter un gestionnaire
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
                                    Email
                                </th>

                                <th>
                                    Structure
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

                            @forelse ($gestionnaires as $gestionnaire)
                                <tr>
                                    <th>
                                        {{ $id++ }}
                                    </th>

                                    <td class="text-primary">
                                        {{ $gestionnaire->user->name }}
                                    </td>

                                    <td>
                                        {{ $gestionnaire->user->email }}
                                    </td>

                                    <td>
                                        {{ $gestionnaire->structure->nom }}
                                    </td>

                                    <td>
                                        <a href=" {{ route('dashboard.gestionnaire.edit', compact('gestionnaire')) }} "
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <form
                                            action=" {{ route('dashboard.gestionnaire.destroy', compact('gestionnaire')) }} "
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p>
                                    Aucun gestionnaire trouvé
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
                                    Email
                                </th>

                                <th>
                                    Structure
                                </th>

                                <th colspan="2" class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $gestionnaires->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
