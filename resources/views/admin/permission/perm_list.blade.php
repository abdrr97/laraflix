@extends('admin.layouts.master')

@section('content')


<div class="container-fluid page__container">

  <div class="card">
    <div class="card-header">
      @include('admin.layouts.includes.header' , ['prev'=>'permission','current'=>$title])
      @role('super_admin')
      <a class="btn btn-primary m-3" href="{{ route('admin.permission.create') }}">
        <i class="fa fa-plus"></i> Add New Permission
      </a>
      @endrole
    </div>
    <div class="card-body">
      <table id="table" class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($permissions as $permission)
          <tr>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->display_name }}</td>
            <td>{{ $permission->description }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('admin.permission.edit', $permission ) }}"
                class="btn btn-info btn-xs"><i class="fa fa-edit" title="Edit"></i>
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