@extends('frontend.layouts.master')

@section('content')

<!-- home -->
<section class="home">
    <!-- home bg -->
    <div class="owl-carousel home__bg">
        @foreach ($featured as $movie)
        <div class="item home__cover" data-bg="{{ $movie->cover }}"></div>
        @endforeach
    </div>
    <!-- end home bg -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title"><strong>FEATURED MOVIES/SERIES</strong> OF THIS SEASON</h1>
                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel">
                    @foreach ($featured as $movie)
                    <div class="item">
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="{{ $movie->cover }}" alt="">
                                <a href="{{ route('browse.show_movie',['id' =>$movie]) }}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a
                                        href="{{ route('browse.show_movie',['id' =>$movie]) }}">{{ $movie->name }}</a>
                                </h3>
                                <span class="card__category">
                                    @foreach ($movie->genres()->get() as $genre)
                                    <a href="{{ route('browse.movie_genres',['genre'=>$genre]) }}">
                                        {{ $genre->name }}
                                    </a>
                                    @endforeach
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $movie->rate }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->


<!-- catalog -->
<div class="catalog mt-5 pt-2">
    <div class="container">
        <div class="row">

            @forelse ($main as $m)

            <!-- card -->
            <div class="col-6 col-sm-12 col-lg-6">
                <div class="card card--list">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="card__cover">
                                <img src="{{ $m->cover }}" alt="">
                                <a href="{{ route('browse.show_movie',['id' =>$m]) }}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-8">
                            <div class="card__content">
                                <h3 class="card__title ">
                                    <a href="{{ route('browse.show_movie',['id' =>$m]) }}">{{ $m->name }}</a>
                                </h3>
                                <span class="card__category">
                                    <span
                                        class="badge badge-sm {{ $m->is_premium ? 'badge-warning': 'badge-primary' }}">
                                        {{ $m->is_premium ? 'premium': 'free' }}
                                    </span>
                                    @if ($m->seasons)
                                    <span class="badge badge-sm badge-success">
                                        serie
                                    </span>
                                    @endif
                                </span>
                                <span class="card__category">
                                    @foreach ($m->genres()->get() as $genre)
                                    <a href="{{ route('browse.movie_genres',['genre'=>$genre]) }}">
                                        {{ $genre->name }}
                                    </a>
                                    @endforeach
                                </span>

                                <div class="card__wrap">
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $m->rate }}</span>
                                    <ul class="card__list">
                                        <li>{{ $m->quality }}</li>
                                        <li>{{ $m->maturity_ratings }}</li>
                                    </ul>
                                </div>

                                <div class="card__description">
                                    <p>{{ $m->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            @empty
            <h1 class="home__title">Nothing here</h1>
            @endforelse

        </div>
    </div>
</div>
<!-- end catalog -->
@endsection
