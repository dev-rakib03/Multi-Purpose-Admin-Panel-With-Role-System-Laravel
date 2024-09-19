@extends('admin.layouts.app')
@section('title', 'Home Settings')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/css/components.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <form class="needs-validation" novalidate="" action="{{route('admin.pages.home.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Home Settings</h4>
                </div>
                <div class="card-body">
                    @foreach ($pageelements as $p_e)
                        @if ($p_e->row_type=='banner_text')
                            @php
                                $arr = explode('|',$p_e->link_or_text);
                            @endphp
                            <div class="form-group">
                                <label  class="section-title mt-0">Title</label>
                                    <input type="text" class="form-control" name="banner_title" value="{{$arr[0]}}">
                                <div class="invalid-feedback">
                                    What's your Title?
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="section-title mt-0">Text</label>
                                <textarea class="form-control" name="banner_text" style="min-height: 150px;">{{$arr[1]}}</textarea>
                                <div class="invalid-feedback">
                                    What's your Text?
                                </div>
                            </div>
                        @endif
                        @if ($p_e->row_type=='banner_btn')
                            @php
                                $arr = explode('|',$p_e->link_or_text);
                            @endphp
                            <div class="form-group">
                                <label  class="section-title mt-0">Button</label>
                                <div class="row" style="margin: 0px 0px;">
                                    <input type="text" placeholder="Button Text" class="form-control col-md-2" name="banner_button_text" value="{{$arr[0]}}">
                                    <input type="text" placeholder="Button Link (https://....)" class="form-control col-md-10" name="banner_button_link" value="{{$arr[1]}}">
                                </div>
                                <div class="invalid-feedback">
                                    Button info.
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">

        <div class="card">
            <form class="needs-validation" novalidate="" action="{{route('admin.success.massage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4>Success Massage</h4>
                </div>
                <div class="card-body">
                    @foreach ($pageelements as $p_e)
                        @if ($p_e->row_type=='success_massage')
                            <div class="form-group">
                                <label  class="section-title mt-0">Text</label>
                                <textarea class="form-control" name="success_massage" style="min-height: 150px;">{{$p_e->link_or_text}}</textarea>
                                <div class="invalid-feedback">
                                    What's your Text?
                                </div>
                            </div>
                        @endif
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
<!-- JS Libraies -->
<script src="{{asset('/')}}backend/assets/bundles/datatables/datatables.min.js"></script>
<script src="{{asset('/')}}backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}backend/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="{{asset('/')}}backend/assets/js/page/datatables.js"></script>
@endsection
