@extends('backend.layouts.app')
@section('title', 'All Roles')
@section('css')
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Roles</h4>
          @if (Auth::guard('admin')->user()->can('role.create'))
          <div class="card-header-action">
            <a href="{{route('admin.roles.create')}}" class="btn btn-primary">Add Role</a>
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
                  <th>Permission</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>
                      {{$loop->index+1}}
                    </td>
                    <td>{{ucfirst($role->name)}}</td>
                    <td class="align-middle" style="width: 70%;">
                        @foreach ($role->permissions as $perm)
                            <div class="badge badge-success badge-shadow" style="margin-bottom: 5px;">{{ $perm->name }}</div>
                        @endforeach
                    </td>
                    <td>
                        @if (Auth::guard('admin')->user()->can('role.edit'))
                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                        @endif
                        @if (auth::guard('admin')->user()->can('role.delete'))
                            <a class="btn btn-danger" href="{{ route('admin.roles.destroy', $role->id) }}"
                                onclick="event.preventdefault(); document.getelementbyid('delete-form-{{ $role->id }}').submit();">
                                delete
                            </a>

                            <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="post" style="display: none;">
                                @method('delete')
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
<script src="{{asset('/')}}backend/assets/bundles/datatables/datatables.min.js"></script>
<script src="{{asset('/')}}backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}backend/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="{{asset('/')}}backend/assets/js/page/datatables.js"></script>
@endsection
