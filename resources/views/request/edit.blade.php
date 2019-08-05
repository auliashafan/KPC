@extends('layout.main')
@section('content')
    <div class="col-md-12">
        <h3 class="font-weight-bold">Edit Development / Modification Request Form</h3>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body ">
                <form action="{{route('request.editpost')}}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="{{$app->id}}">
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-10" name="applicationtitle" value="{{$app->applicationtitle}}">
                            <textarea class="tinymce" name="request_text">{!! $app->request_text !!}</textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="{{$app->costcode}}" disabled>
                            <select class="form-control mt-5" disabled>
                                <option disabled>Authorized By</option>
                                <option value="Manager" @if($app->authorizedby == "Manager") selected @endif>Manager</option>
                                <option value="General Manager" @if($app->authorizedby == "General Manager") selected @endif>General Manager</option>
                            </select>
                            <hr>
                            <label>Date of Request</label>
                            <input class="form-control" type="text" value="{{$app->daterequest}}" disabled>
                            <label class="mt-5">Expected Completion Date</label>
                            <input class="form-control mt-0" type="text" value="{{$app->dateexpected}}" disabled>
                            <button type="submit" class="btn btn-gradient-primary font-weight-bold btn-block mt-10">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection