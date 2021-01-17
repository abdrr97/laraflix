@extends('admin.layouts.master')

@section('content')


<div class="container-fluid page__container">

  <div class="card">

    <div class="card-header">
      <div class="flex flex-inline">
        @include('admin.layouts.includes.header' , ['prev'=>'Users','current'=>$title])
        @role('super_admin')
        <a class="btn btn-primary m-3" href="{{ route('admin.users.create') }}">
          <i class="fa fa-user-plus"></i> Add New User
        </a>
        @endrole
      </div>
    </div>
    <div class="card-body">
      <table id="table" class="table">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Banned</th>
            <th>Banned for (days)</th>
            <th>Last Connected</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          @if ($user != Auth::user())
          <tr>
            <td>
              @if(isset($user->profile_image) && $user->profile_image != 'avatar.png')
              <img width="35" height="35" src="{{ asset('storage/users/'.$user->id.'/images/'.$user->profile_image) }}"
                class="rounded-circle">
              @else
              <img width="35" height="35" src="{{ asset('storage/'.$user->profile_image) }}" class="rounded-circle">
              @endif
              <b>{{ $user->username }}</b>
            </td>
            <td>{{ $user->email }}
              @if ($user->roles->first()->name == 'admin'
              || $user->roles->first()->name == 'super_admin'
              || $user->roles->first()->name == 'premium_user')
              <small class="badge badge-warning ml-2">PRO</small>
              @endif
            </td>
            <td>
              @switch($user->roles->first()->name)
              @case('admin')
              <span class="badge badge-primary">
                {{ $user->roles->first()->display_name }}
              </span>
              @break
              @case('premium_user')
              <span class="badge badge-success">
                {{ $user->roles->first()->display_name }}
              </span>
              @break
              @case('super_admin')
              <span class="badge badge-warning">
                {{ $user->roles->first()->display_name }}
              </span>
              @break
              @case('user')
              <span class="badge badge-dark">
                {{ $user->roles->first()->display_name }}
              </span>
              @break

              @default
              <span class="badge badge-dark">
                {{ $user->roles->first()->display_name }}
              </span>
              @break

              @endswitch
            </td>
            <td>
              @if(!empty($user->banned_until) && now()->lessThan($user->banned_until))
              <span class="badge badge-danger">BANNED</span>
              @else
              <span class="badge badge-success">NOT BANNED</span>
              @endif
            </td>
            <td>
              <small class="text-muted">
                {{ now()->lessThan($user->banned_until)? $user->banned_until->diffInDays() .' '. Str::plural('day', $user->banned_until->diffInDays()) : 'banned time not set' }}
              </small>
            </td>
            <td>
              @isset($user->last_connected)
              <small class="text-muted">{{ $user->last_connected->diffForHumans() }}</small>
              @else
              <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
              @endisset
            </td>
            <td>
              <div class="btn-group">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm" title="EDIT">
                  <i class="fa fa-user-edit" title="Edit"></i>
                </a>
                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-danger btn-sm" title="DELETE">
                  <i class="fa fa-user-times" title="Delete"></i>
                </a>
              </div>
            </td>
          </tr>
          @endif
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