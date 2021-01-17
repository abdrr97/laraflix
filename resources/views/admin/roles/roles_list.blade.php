@extends('admin.layouts.master')

@section('content')


<div class="container-fluid page__container">


  <div class="card">
    <div class="card-header">
      @include('admin.layouts.includes.header' , ['prev'=>'role','current'=>$title])
      @role('super_admin')
      <a class="btn btn-primary m-3" href="{{route('admin.roles.create')}}">
        <i class="fa fa-plus"></i> Add New Role
      </a>
      @endrole
    </div>
    <div class="card-body">
      <table id="table" class="table table-hover">
        <thead>
          <tr>
            <th>Role Display</th>
            <th>Role Description</th>
            <th>Role</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
          <tr>
            <td>{{ $role->display_name }}</td>
            <td>{{ $role->description }}</td>
            <td>{{ $role->name }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role) }}" class="btn btn-info btn-xs"><i
                  class="fa fa-edit" title="Edit"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script>
  $(document).ready( function () {
    $('#table').DataTable();
  } );
</script>
@endsection