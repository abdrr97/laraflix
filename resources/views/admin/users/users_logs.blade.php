@extends('admin.layouts.master')

@section('content')


<div class="container-fluid page__container">

    <div class="card">

        <div class="card-header">
            <div class="flex flex-inline">
                @include('admin.layouts.includes.header' , ['prev'=>'Users','current'=>'User Login History'])
            </div>
        </div>
        <div class="card-body">
            <table id="table" class="table table-xl-responsive">
                <thead>
                    <tr>
                        <th>Ip Address</th>
                        <th>Country Name</th>
                        <th>Country Flag</th>
                        <th>zipcode</th>
                        <th>ISP</th>
                        <th>User Agent</th>
                        <th>User Name</th>
                        <th width="10%">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_logins_history as $logs)
                    <tr>
                        <td><small class="text-muted">{{ $logs->ip }}</small></td>
                        <td><small class="text-muted">{{ $logs->country_name }}</small></td>
                        <td><img src="{{ $logs->country_flag }}" width="30" alt=""></td>
                        <td><small class="text-muted">{{ $logs->zipcode }}</small></td>
                        <td><small class="text-muted">{{ $logs->isp }}</small></td>
                        <td><small class="text-muted">{{ $logs->user_agent }}</small></td>
                        <td><small class="text-muted">{{ $logs->user_id }}</small></td>
                        <td width="5%">
                            <form action="{{ route('admin.users.destroy_users_logs',$logs) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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
    });
</script>
@endsection
