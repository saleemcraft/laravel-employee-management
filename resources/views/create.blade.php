
@extends('layouts.app')
@section('content')
<a href="{{route('employee.index')}}" class="btn btn-primary btn-sm">Back to Employee List</a>        
<div class="card">
            <div class="card-body">
                <p style="font-size:20px; font-weight:bold;">Create New Employee</p>
                <form action="{{route('employee.store')}}" class="was-validated" method="POST" novalidate>
                @csrf    
                <div class="form-group has-validation">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif  
                    </div>
                    <div class="form-group has-validation">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="joining_date">Joining date</label>
                        <input type="date" name="joining_date" id="joining_date" class="form-control {{ $errors->has('joining_date') ? 'is-invalid' : '' }}" required value="{{ old('joining_date') }}">
                        @if($errors->has('joining_date'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('joining_date') }}</strong>
                            </span> 
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="joining_salary">Joining salary</label>
                        <input type="number" name="joining_salary" id="joining_salary" class="form-control {{ $errors->has('joining_salary') ? 'is-invalid' : '' }}" required value="{{ old('joining_salary') }}">
                        @if($errors->has('joining_salary'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('joining_salary') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="is_active">Active</label><br>
                        <input type="checkbox" name="is_active" id="is_active" value="1" class="{{ $errors->has('is_active') ? 'is-invalid' : '' }}" required {{ old('is_active')==1 ? 'checked' : '' }}>
                        @if($errors->has('is_active'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('is_active') }}</strong>
                            </span> 
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Create Employee</button>
                </form>
            </div>
        </div>
   @endsection