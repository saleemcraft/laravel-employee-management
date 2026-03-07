
@extends('layouts.app')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
{{session()->get('success')}}
</div>
@endif
        <div class="row"> </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <strong>Employee List</strong>
                        <a href="{{route('employee.create')}}" class="btn btn-primary btn-xs float-end py-0">Create Employee</a>
                        <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Joining Salary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $key => $employee)
                                <tr>
                                    <td>{{ $employees->firstItem() + $key }}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->joining_date}}</td>
                                    <td>{{$employee->joining_salary}}</td>  
                                    <td><span type="button" class="btn {{ $employee->is_active == 1 ? 'btn-success' : 'btn-danger' }} btn-xs py-0">{{$employee->is_active==1 ? 'Active' : 'Inactive'}}</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        <a href="{{route('employee.show',$employee->id)}}" class="btn btn-primary btn-sm">Show</a>
                                        <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{route('employee.destroy',$employee->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    
                    </div>
                </div>
            </div>
        </div>
@endsection        
 