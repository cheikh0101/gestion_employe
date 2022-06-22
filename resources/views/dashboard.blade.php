@extends('layouts.app')

@section('content')
    @if (auth()->user()->is_admin)
        <div class="container">
            <div class="row mt-5">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-bottom-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fa fa-bar-chart fa-2x text-gray-300" aria-hidden="true"></i>
                                </div>
                                <div class="col mr-2">
                                    <div class="h5 mb-0 text-center font-weight-bold text-gray-800">STATISTIQUES</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-bar-chart fa-2x text-gray-300" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Nombre d'administrateurs</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $administrateurs }} </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Nombre de gestionnaires</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $gestionnaires }} </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Nombre de structures</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $structures }} </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Nombre d'employés</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $membres }} </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
