@extends('admin.layouts.master')


@section('content')
<div class="container-fluid page__container">

    <div class="card">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'series','current'=>'serie list'])
            @role('super_admin')
            <a class="btn btn-primary m-3" href="{{ route('admin.series.create') }}">
                <i class="fa fa-film"></i> Add New Serie
            </a>
            @endrole
        </div>
        <div class="card-body">
            <table class="table table-responsive-lg table-responsive-md table-responsive-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cover</th>
                        <th>Year</th>
                        <th>Rate</th>
                        <th>Maturity Ratings</th>
                        <th>Trailer Video</th>
                        <th>Premium</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($series)
                    @foreach ($series as $serie)
                    <tr>
                        <td><small class="text-muted">{{ $serie->id }}</small></td>
                        <td>{{ $serie->name }}</td>
                        <td>
                            <img width="50px" src="{{ asset('thumbnail/'. $serie->cover ) }}" alt="">
                        </td>
                        <td>{{ $serie->year }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{ $serie->rate }}
                                <i class="material-icons">star</i>
                            </div>
                        </td>
                        <td>{{ $serie->maturity_ratings }}</td>
                        <td>
                            <a target="_blank" class="btn-link btn-xs" href="{{ $serie->trailer_url }}">
                                {{ $serie->name }}
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-{{ $serie->is_premium ? 'warning' : 'primary'}}">
                                {{ $serie->is_premium ? 'Premium' : 'Free'}}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $serie->is_active ? 'success' : 'danger'}}">
                                {{ $serie->is_active ? 'Active' : 'Inactive'}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.series.edit',['series'=>$serie]) }}"
                                    class="mr-1 btn btn-sm btn-outline-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {{-- <a href="{{ route('admin.series.show',['serie'=>$serie]) }}"
                                class="mr-1 btn btn-sm btn-outline-success">
                                <i class="fa fa-eye"></i>
                                </a> --}}

                                {{-- <form action="{{ route('admin.series.destroy',['serie'=>$serie]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="mr-1 btn btn-sm btn-outline-danger" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
            {{ $series->links() }}
        </div>
    </div>

</div>
@endsection
