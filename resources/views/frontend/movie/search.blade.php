@extends('frontend.layouts.master')

@section('content')

@include('frontend.layouts.includes.header',['current_page'=> $current_page])

<!-- catalog -->
<div class="catalog mt-5">
    <div class="container">
        <span class="card__category">
            <a href="/browse" class="btn btn-link">Back</a>
        </span>
        <div class="row">
            @forelse ($filmx as $result)
            @if ($result->type == 'movies' || $result->type == 'series')
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{ $result->searchable->cover }}" alt="">
                        <a href="{{ route('browse.show_movie',['id' =>$result->searchable]) }}" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title">
                            <a
                                href="{{ route('browse.show_movie',['id' =>$result->searchable]) }}">{{ $result->searchable->name }}</a>
                        </h3>
                        <span class="card__category">
                            <span
                                class="badge badge-sm {{ $result->searchable->is_premium ? 'badge-warning': 'badge-primary' }}">
                                {{ $result->searchable->is_premium ? 'premium': 'free' }}
                            </span>
                            @if ($result->searchable->seasons)
                            <span class="ml-2 badge badge-sm badge-success">
                                serie
                            </span>
                            @endif
                            @if ($result->searchable->is_new)
                            <span class="ml-2  badge badge-sm badge-danger">
                                new
                            </span>
                            @endif
                        </span>
                        <span class="card__category">
                            @foreach ($result->searchable->genres()->get() as $genre)
                            <a href="{{ route('browse.movie_genres',['genre'=>$genre]) }}">{{ $genre->name }}</a>
                            @endforeach
                        </span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $result->searchable->rate }}</span>
                    </div>
                </div>
            </div>
            @endif
            @if ($result->type == 'genres')
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <span class="card__category">
                    <a href="{{ route('browse.movie_genres',['genre'=>$result->searchable]) }}">
                        {{ $result->searchable->name }}
                    </a>
                </span>
            </div>
            @endif


            @empty
            <h3 class="text-center">Nothing here yet 😎</h3>
            @endforelse

        </div>
    </div>
    <!-- end catalog -->


    @endsection
