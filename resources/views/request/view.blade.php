@extends('layout.main')
@section('content')
    <div class="col-md-12">
        <h3 class="font-weight-bold">Development / Modification Request Form</h3>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body ">
                <div class="table-wrap">
                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                        <thead>
                        <tr>
                            <th>BN</th>
                            <th>Name</th>
                            <th>Division</th>
                            <th>Department</th>
                            <th>Application Title</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($application as $app)
                            <tr>
                                <td>{{$app->batch_number}} @if(\Illuminate\Support\Facades\Auth::user()->role == "User") <a href="{{route('request.edit',$app->id)}}" class="ion-ios-settings text-warning"></a> @endif</td>
                                <td>{{$app->user->name}}</td>
                                <td>{{$app->user->division}}</td>
                                <td>{{$app->user->department}}</td>
                                <td>{{$app->applicationtitle}}</td>
                                <td>
                                    @if($app->status == "Proses")
                                        Cancel
                                    @else
                                        {{$app->status}}
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning btn-block view_request" data-value="{{$app->id}}" data-status="{{$app->status}}">View</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>BN</th>
                            <th>Name</th>
                            <th>Division</th>
                            <th>Department</th>
                            <th>Application Title</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <small>Request By</small>
                            <p class="font-weight-bold" id="requestby">Aulia</p>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                            <small>Badge ID</small>
                            <p class="font-weight-bold" id="badgeid">1</p>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                            <small>Date of Request</small>
                            <p class="font-weight-bold" id="dateofrequest">07/09/2019</p>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                            <small>Application Title</small>
                            <p class="font-weight-bold" id="title">Title</p>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <small>Details</small>
                        </div>
                        <div class="col-md-12">
                            <p id="details"></p>
                        </div>
                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Auth::user()->role == "General Manager" || \Illuminate\Support\Facades\Auth::user()->role == "Manager")
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary approve">Proses</button>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == "Admin")
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-warning revision">Cancel</a>
                        <button type="button" class="btn btn-primary development">Start Development</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection