@extends('layout.main')
@section('content')
    <div class="col-md-12">
        <h3>Development / Modification Request Form</h3>
        <hr>
    </div>
    <div class="col-lg-4">
        <div class="card card-sm border-bottom-0">
            <div class="card-header card-header-action">
                <h6>Device Stats</h6>
                <div class="d-flex align-items-center card-action-wrap">
                    <div class="inline-block dropdown">
                        <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pa-0">
                <div class="pa-15">
                    <div class="row">
                        <div class="col-4">
                            <span class="d-block text-capitalize">desktop</span>
                            <span class="d-block text-dark font-weight-500 font-20">15%</span>
                            <span class="d-block font-weight-600 font-13">201,434</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block text-capitalize">mobile</span>
                            <span class="d-block text-dark font-weight-500 font-20">34.5%</span>
                            <span class="d-block font-weight-600 font-13">101,434</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block text-capitalize">tablet</span>
                            <span class="d-block text-dark font-weight-500 font-20">60.8%</span>
                            <span class="d-block font-weight-600 font-13">101,434</span>
                        </div>
                    </div>
                </div>
                <div class="progress-wrap">
                    <div class="progress rounded-bottom-left rounded-bottom-right">
                        <div class="progress-bar bg-primary w-15" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-indigo-light-1 w-35" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-indigo-light-2 w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection