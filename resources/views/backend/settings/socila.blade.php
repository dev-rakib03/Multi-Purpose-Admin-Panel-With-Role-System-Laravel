@extends('backend.layouts.app')
@section('title', 'Social Settings')
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
            <form class="needs-validation" novalidate="" action="{{route('admin.settings.social.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-header">
                <h4>Social Settings</h4>
            </div>
            <div class="card-body">
                @php
                    $i=1;
                @endphp
                @foreach ($socials as $social)
                    <div class="form-group">
                        <label  class="section-title mt-0">{{$social->name}}</label>
                        <input type="text" class="form-control" name="a{{$i++}}" value="{{$social->link}}">
                        <div class="invalid-feedback">
                            What's your social link?
                        </div>
                    </div>
                @endforeach
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
