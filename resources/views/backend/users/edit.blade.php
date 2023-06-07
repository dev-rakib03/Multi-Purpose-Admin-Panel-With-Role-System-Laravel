@extends('backend.layouts.app')
@section('title', 'User Edit')
@section('css')

<style>
    .custom-control-label {
        text-transform: capitalize;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">

        <div class="card">
            <form class="needs-validation" novalidate="" action="{{route('admin.users.update',$user->id)}}" method="POST">
                @method('PUT')
                @csrf
            <div class="card-header">
                <h4>Edit User</h4>
            </div>
            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label  class="section-title mt-0">Name</label>
                        <input type="text" class="form-control" required="" name="name" value="{{$user->name}}">
                        <div class="invalid-feedback">
                            What's your name?
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label  class="section-title mt-0">Email</label>
                        <input type="text" class="form-control" required="" name="email" value="{{$user->email}}">
                        <div class="invalid-feedback">
                            What's your user email?
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label  class="section-title mt-0">Password</label>
                        <input type="password" class="form-control" name="password">
                        <div class="invalid-feedback">
                            What's your password?
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label  class="section-title mt-0">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        <div class="invalid-feedback">
                            What's your password?
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>

    </div>
  </div>
@endsection
@section('scripets')
@endsection
