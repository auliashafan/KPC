@extends('layout.main')
@section('content')
    <div class="col-md-12">
        <h3 class="font-weight-bold">Development / Modification Request Form</h3>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body ">
                <form action="{{route('request.post')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-10" name="applicationtitle" placeholder="Application Title">
                            <textarea class="tinymce" name="request_text"></textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="costcode" placeholder="Cost Code">
                            <select class="form-control mt-5" name="authorizedby">
                                <option disabled selected>Authorized By</option>
                                @foreach($user as $us)
                                    <option value="{{$us->id}}">{{$us->id}}</option>
                                @endforeach
{{--                                <option value="Manager">Manager</option>--}}
{{--                                <option value="General Manager">General Manager</option>--}}
                            </select>
                            <hr>
{{--                            <label>Date of Request</label>--}}
{{--                            <input class="form-control" type="text" name="daterequest"/>--}}
{{--                            <label class="mt-5">Expected Completion Date</label>--}}
{{--                            <input class="form-control mt-0" type="text" name="dateexpected"/>--}}
                            <label class="mt-5">Date of Request & Expected Completion Date</label>
                            <input class="form-control" type="text" name="daterange"  />
                            <button type="submit" class="btn btn-gradient-primary font-weight-bold btn-block mt-10">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection