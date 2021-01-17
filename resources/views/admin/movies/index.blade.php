@extends('admin.layouts.master')


@section('content')
<div class="container-fluid page__container">

    <div class="card">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'movies','current'=>'movie list'])
            @role('super_admin')
            <a class="btn btn-primary m-3" href="{{ route('admin.movies.create') }}">
                <i class="fa fa-film"></i> Add New Movie
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
                    @isset($movies)
                    @foreach ($movies as $movie)
                    <tr>
                        <td><small class="text-muted">{{ $movie->id }}</small></td>
                        <td>{{ $movie->name }}</td>
                        <td>
                            <img width="50px" src="{{ asset('thumbnail/'. $movie->cover ) }}" alt="">
                        </td>
                        <td>{{ $movie->year }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{ $movie->rate }}
                                <i class="material-icons">star</i>
                            </div>
                        </td>
                        <td>{{ $movie->maturity_ratings }}</td>
                        <td>
                            <a target="_blank" class="btn-link btn-xs" href="{{ $movie->trailer_url }}">
                                {{ $movie->name }}
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-{{ $movie->is_premium ? 'warning' : 'primary'}}">
                                {{ $movie->is_premium ? 'Premium' : 'Free'}}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $movie->is_active ? 'success' : 'danger'}}">
                                {{ $movie->is_active ? 'Active' : 'Inactive'}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.movies.edit',['movie'=>$movie]) }}"
                                    class="mr-1 btn btn-sm btn-outline-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.movies.show',['movie'=>$movie]) }}"
                                    class="mr-1 btn btn-sm btn-outline-success">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <form action="{{ route('admin.movies.destroy',['movie'=>$movie]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="mr-1 btn btn-sm btn-outline-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
            {{ $movies->links() }}
        </div>
    </div>

</div>
@endsection
