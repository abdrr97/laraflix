@extends('frontend.layouts.master')

@section('content')

@include('frontend.layouts.includes.header',['current_page'=> $current_page])

<!-- catalog -->
<div class="catalog mt-5">
    <div class="container">
        <div class="row">
            @forelse ($filmx as $movie)

            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{ $movie->cover }}" alt="">
                        <a href="{{ route('browse.show_movie',['id' =>$movie]) }}" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title">
                            <a href="{{ route('browse.show_movie',['id' =>$movie]) }}">{{ $movie->name }}</a>
                        </h3>
                        <span class="card__category">
                            <span class="badge badge-sm {{ $movie->is_premium ? 'badge-warning': 'badge-primary' }}">
                                {{ $movie->is_premium ? 'premium': 'free' }}
                            </span>
                            @if ($movie->seasons)
                            <span class="ml-2 badge badge-sm badge-success">
                                serie
                            </span>
                            @endif
                            @if ($movie->is_new)
                            <span class="ml-2  badge badge-sm badge-danger">
                                new
                            </span>
                            @endif
                        </span>
                        <span class="card__category">
                            @foreach ($movie->genres()->get() as $genre)
                            <a href="{{ route('browse.movie_genres',['genre'=>$genre]) }}">{{ $genre->name }}</a>
                            @endforeach
                        </span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $movie->rate }}</span>
                    </div>
                </div>
            </div>


            @empty
            <h3 class="text-center">Nothing here yet 😎</h3>
            @endforelse

            <!-- paginator -->
            @if ($current_page != 'latest')
            <div class="col-12">
                {{ $filmx->links() }}
            </div>
            @endif
            <!-- end paginator -->

        </div>
    </div>
    <!-- end catalog -->


    @endsection
