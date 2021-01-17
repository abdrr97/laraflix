@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{ $cast->name }}</h1>
        </div>
        <div class="card-body">
            <div class="row p-3">

                @foreach ($movies as $movie)

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">{{ $movie->name }}</div>
                        <div class="card-body">
                            <p>
                                {{ $movie->desription }}
                            </p>
                            <div>{{ $movie->year }}</div>
                            <div>{{ $movie->rate }}</div>
                            <div><a href="{{ $movie->trailer_url }}" target="_blank">{{ $movie->trailer_url }}</a></div>
                            <div>{{ $movie->maturity_ratings }}</div>
                            <div>{{ $movie->is_premium }}</div>
                            <div>{{ $movie->is_active }}</div>
                            <small>{{ $movie->created_at }}</small>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
