@extends('layout.main')
@section('content')
    <div class="col-md-12">
        <h3 class="font-weight-bold">Revision Lists</h3>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body ">
                <div class="table-wrap">
                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                        <thead>
                        <tr>
                            <th width="10">No</th>
                            <th width="10%">BN</th>
                            <th width="20%">Revised By</th>
                            <th>Revision</th>
                            <th width="10%">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $x=1; @endphp
                        @foreach($revision->unique('request_id') as $rev)
                            <tr>
                                <td>{{$x}}</td>
                                <td>{{$rev->application->batch_number}}</td>
                                <td>{{$rev->user->name}} / {{$rev->user->role}}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role == "User")
                                    @php $data = \App\Revision::where('request_id', $rev->request_id)->get(); @endphp
                                    <td>
                                    @foreach($data as $dat)
                                        <br>{{$dat->revision}}<br><i class="text-right font-italic">- {{$dat->user->name}}</i>
                                    @endforeach
                                    </td>
                                @else
                                    <td>{{$rev->revision}}</td>
                                @endif
                                <td>{{$rev->created_at->format('d/m/Y')}}</td>
                            </tr>
                            @php $x++; @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Batch</th>
                            <th>Revised By</th>
                            <th>Revision</th>
                            <th>Date</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection