@extends('admin.layouts.master')

@section('content')
<div class="container-fluid page__container">

    @include('admin.layouts.includes.header' , ['prev'=>'admin','current'=>'home'])

    <div class="row card-group-row">
        @isset($general)
        @foreach ($general as $g)
        <div class="col-xl-3 col-md-6 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div><i class="fa {{ $g->icon }} {{ $g->text_color }} icon-48pt mr-2"></i></div>
                <div class="flex">
                    <div class="text-amount ">{{ $g->count }}</div>
                    <div class="text-muted text-uppercase mt-1">{{ $g->name }}</div>
                </div>
            </div>
        </div>
        @endforeach
        @endisset
    </div>

    <div class="row card-group-row">
        <div class="col-xl-6 col-md-12 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div><i class="fa fa-user icon-48pt mr-2"></i></div>
                <div class="flex">
                    <div class="text-amount">{{ $comments }}</div>
                    <div class="text-muted text-uppercase mt-1">COMMENTS</div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-12 card-group-row__col">
            <div class="card card-group-row__card card-body flex-row align-items-center">
                <div><i class="fa fa-user icon-48pt mr-2"></i></div>
                <div class="flex">
                    <div class="text-amount">{{ $premium_users }}</div>
                    <div class="text-muted text-uppercase mt-1">SUBSCRIBED USERS</div>
                </div>
            </div>
        </div>

    </div>

    <div class="row card-group-row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    Latest Movies
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest->movies as $lts)
                            <tr>
                                <td><small>{{ $lts->id }}</small></td>
                                <td class="text-capitalize">{{ $lts->name }}</td>
                                <td><small>{{ $lts->created_at->diffForHumans() }}</small></td>
                                <td>
                                    <a href="{{ route('admin.movies.index') }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    Latest Registred Users
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest->users as $lts)
                            <tr>
                                <td><small>{{ $lts->id }}</small></td>
                                <td class="text-capitalize">{{ $lts->username }}</td>
                                <td><small>{{ $lts->created_at->diffForHumans() }}</small></td>
                                <td>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    Latest Comments
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest->comments as $lts)
                            <tr>
                                <td><small>{{ $lts->id }}</small></td>
                                <td class="text-capitalize"><a target="_blank"
                                        href="/browse/{{ $lts->commentable_id }}#comment-{{ $lts->id }}">{{ $lts->comment }}</a>
                                </td>
                                <td><small>{{ $lts->created_at->diffForHumans() }}</small></td>
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
