@extends('layout.main')
@section('content')
    <div class="col-md-12">
        <h3 class="font-weight-bold">User Management</h3>
        <hr>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="table-wrap">
                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Division</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Act</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $x=1; @endphp
                        @foreach($user as $use)
                            <tr>
                                <td>{{$x}}</td>
                                <td>{{$use->name}}</td>
                                <td>{{$use->division}}</td>
                                <td>{{$use->department}}</td>
                                <td>{{$use->role}}</td>
                                <td>{{$use->email}}</td>
                                <td><button type="button" class="btn btn-sm btn-danger delete-user" data-value="{{$use->id}}"><i class="ion-ios-trash"></i></button></td>
                            </tr>
                        @php $x++; @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Division</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Act</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('user.new')}}" method="post">
                    @csrf
                    <label class="mb-0">Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <label class="mb-0 mt-5">Division</label>
                    <select class="form-control" name="division" required>
                        <option disabled selected></option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Coal Processing and Handling">Coal Processing and Handling</option>
                        <option value="Mining Support">Mining Support</option>
                        <option value="Health Safety">Health Safety</option>
                        <option value="Development">Development</option>
                    </select>
                    <label class="mb-0 mt-5">Department</label>
                    <select class="form-control" name="department" required>
                        <option disabled selected></option>
                        <option value="System Compliance">System Compliance</option>
                        <option value="Learning and Development">Learning and Development</option>
                        <option value="CPP Maintenance">CPP Maintenance</option>
                        <option value="Infrastructure">Infrastructure</option>
                        <option value="Hatari">Hatari</option>
                        <option value="Environment">Environment</option>
                        <option value="Geology">Geology</option>
                    </select>
                    <label class="mb-0 mt-5">Role</label>
                    <select class="form-control" name="role" required>
                        <option disabled selected></option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="General Manager">General Manager</option>
                    </select>
                    <label class="mb-0 mt-5">Email</label>
                    <input type="email" class="form-control " name="email" required>
                    <label class="mb-0 mt-5">Password</label>
                    <input type="password" class="form-control" name="password" required>
                    <button type="submit" class="btn btn-gradient-primary font-weight-bold btn-block mt-10">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection