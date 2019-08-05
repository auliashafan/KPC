@extends('layout.main')
@section('content')
    <div class="col-md-12">
        <h3 class="font-weight-bold">Request Revision #{{$app->id}}</h3>
        <hr>
    </div>
    <div class="col-lg-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <small>Current Request</small>
                {!! $app->request_text !!}
                <hr>
                <small>Revision</small>
                <form action="{{route('revision.post')}}" method="POST">
                    @csrf
                    <textarea name="revision" class="form-control" rows="5"></textarea>
                    <input type="hidden" name="id" value="{{$app->id}}">
                    <input type="hidden" name="requester" value="{{$app->requester_id}}">
                    <button type="submit" class="btn btn-gradient-primary font-weight-bold mt-10 float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection