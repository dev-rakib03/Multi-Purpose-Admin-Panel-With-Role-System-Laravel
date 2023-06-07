@extends('backend.layouts.app')
@section('title', 'All Admins')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}public/backend/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('/')}}public/backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Admins</h4>
          @if (Auth::guard('admin')->user()->can('admin.create'))
          <div class="card-header-action">
            <a href="{{route('admin.admins.create')}}" class="btn btn-primary">Add admin</a>
          </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>
                      {{$loop->index+1}}
                    </td>
                    <td>{{ucfirst($admin->name)}}</td>
                    <td>{{$admin->email}}</td>
                    <td class="align-middle" style="">
                        @foreach ($admin->roles as $role)
                            <div class="badge badge-success badge-shadow" style="margin-bottom: 5px;">{{ $role->name }}</div>
                        @endforeach
                    </td>
                    <td>
                        @if (Auth::guard('admin')->user()->can('admin.edit'))
                            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
                        @endif
                        @if (Auth::guard('admin')->user()->can('admin.delete'))
                            <a class="btn btn-danger" href="{{ route('admin.admins.destroy', $admin->id) }}"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                Delete
                            </a>

                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripets')
<!-- JS Libraies -->
<script src="{{asset('/')}}public/backend/assets/bundles/datatables/datatables.min.js"></script>
<script src="{{asset('/')}}public/backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}public/backend/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="{{asset('/')}}public/backend/assets/js/page/datatables.js"></script>
@endsection
