@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>
                    Liste des structures ({{ count($structures) }})
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-start">
                <form action=" {{ route('dashboard.structure.search') }} " method="post">
                    @csrf
                    <input type="text" class="form-control" name="motCle" id="" aria-describedby="helpId"
                        placeholder="Recherche">
                </form>
            </div>
            <div class="col d-flex justify-content-end">
                <a href=" {{ route('dashboard.structure.create') }} " class="btn btn-primary">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Ajouter une structure
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
                                    Logo
                                </th>

                                <th>
                                    Nom
                                </th>

                                <th>
                                    Code
                                </th>

                                <th>
                                    Cigle
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

                            @forelse ($structures as $structure)
                                <tr>
                                    <th>
                                        {{ $id++ }}
                                    </th>

                                    <td>
                                        {{ $structure->logo }}
                                    </td>

                                    <td class="text-primary">
                                        {{ $structure->nom }}
                                    </td>

                                    <td>
                                        {{ $structure->code }}
                                    </td>

                                    <td>
                                        {{ $structure->cigle }}
                                    </td>

                                    <td>
                                        <a href=" {{ route('dashboard.structure.edit', compact('structure')) }} "
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <form action=" {{ route('dashboard.structure.destroy', compact('structure')) }} "
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
                                    Aucune Structure trouvée
                                </p>
                            @endforelse

                        </tbody>

                        <tfoot class="table-dark">
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Logo
                                </th>

                                <th>
                                    Nom
                                </th>

                                <th>
                                    Code
                                </th>

                                <th>
                                    Cigle
                                </th>

                                <th colspan="2" class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $structures->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
