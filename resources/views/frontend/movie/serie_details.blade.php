@extends('frontend.layouts.master')

@section('content')
<section class="section details">
    <!-- details background -->
    <div class="details__bg" data-bg="{{ asset('frontend/img/home/home__bg.jpg') }}"></div>
    <!-- end details background -->

    <!-- details content -->
    <div class="container">
        <div class="row">
            <!-- title -->
            <div class="col-12">
                <h1 class="details__title">{{ $serie->name }}</h1>
            </div>
            <!-- end title -->

            <!-- content -->
            <div class="col-10">
                <div class="card card--details card--series">
                    <div class="row">
                        <!-- card cover -->
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                            <div class="card__cover">
                                <img src="{{ $serie->cover }}" alt="">
                            </div>
                        </div>
                        <!-- end card cover -->

                        <!-- card content -->
                        <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
                            <div class="card__content">
                                <div class="card__wrap">
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $serie->rate }}</span>

                                    <ul class="card__list">
                                        <li>{{ $serie->quality }}</li>
                                        <li>{{ $serie->maturity_ratings }}</li>
                                    </ul>
                                </div>

                                <ul class="card__meta">
                                    <li><span>Genre:</span>
                                        @foreach ($serie->genres()->get() as $genre)
                                        <a href="{{ route('browse.movie_genres',['genre'=>$genre]) }}">
                                            {{ $genre->name }}
                                        </a>
                                        @endforeach
                                    </li>
                                    <li><span>Release year:</span> {{ $serie->year }}</li>
                                </ul>
                                <div class="card__description card__description--details">
                                    {{ $serie->description }}
                                </div>
                            </div>
                        </div>
                        <!-- end card content -->
                    </div>
                </div>
            </div>
            <!-- end content -->

            <!-- player -->
            <div class="col-12 col-xl-6">

                <div style="padding:56.25% 0 0 0;position:relative;">
                    <iframe
                        src="{{ $vimeo_url }}{{ !empty($vimeo_url) ? '?title=0&byline=0&portrait=0&like=0&logo=0' : '' }}"
                        style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                        allow="autoplay; fullscreen" allowfullscreen>
                    </iframe>
                </div>

            </div>
            <!-- end player -->

            <!-- accordion -->
            <div class="col-12 col-xl-6">
                <div class="accordion" id="accordion">
                    @foreach ($serie->seasons()->where('publish_date', '<=', now('Africa/Casablanca'))->get() as
                        $season) <div class="accordion__card">
                        <div class="card-header" id="headingOne">
                            <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                <span>Season: {{ $loop->index + 1}}</span>
                                <span>{{ $season->title }}</span>
                            </button>
                        </div>

                        <div id="collapseOne"
                            class="collapse {{ $season->id == $s || $loop->index == 0 && empty($s) ? 'show' : ''}}"
                            aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <table class="accordion__list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Air Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach (
                                        $season->episodes()->where('publish_date', '<=', now('Africa/Casablanca'))->
                                            get() as $episode ) <tr
                                            class="{{ $episode->id == $e || $loop->index == 0 && empty($e) ? 'bg-dark' : ''}}">
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>
                                                <a href="?season={{ $season->id }}&episode={{ $episode->id }}">
                                                    {{ $episode->title }}
                                                </a>
                                            </td>
                                            <td> <em><small>{{ $episode->publish_date }}</small></em> </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- end accordion -->

        <div class="col-12">
            <div class="details__wrap">
                <!-- availables -->
                <div class="details__devices">
                    <span class="details__devices-title">Available on devices:</span>
                    <ul class="details__devices-list">
                        <li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
                        <li><i class="icon ion-logo-android"></i><span>Android</span></li>
                        <li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
                        <li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
                    </ul>
                </div>
                <!-- end availables -->

                <!-- share -->
                <div class="details__share">
                    <span class="details__share-title">Share with friends:</span>

                    <ul class="details__share-list">
                        <li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                        <li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                        <li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                        <li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
                    </ul>
                </div>
                <!-- end share -->
            </div>
        </div>
    </div>
    </div>
    <!-- end details content -->
</section>
<!-- end details -->

<!-- content -->
<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title">Discover</h2>
                    <!-- end content title -->

                    <!-- content tabs nav -->
                    <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
                                aria-selected="true">Comments</a>
                        </li>


                    </ul>
                    <!-- end content tabs nav -->

                    <!-- content mobile tabs nav -->
                    <div class="content__mobile-tabs" id="content__mobile-tabs">
                        <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="button" value="Comments">
                            <span></span>
                        </div>

                        <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                        href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end content mobile tabs nav -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8">
                <!-- content tabs -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                        <div class="row">
                            <!-- comments -->
                            <div class="col-12">
                                <div class="comments">
                                    @comments(['model' => $serie,'approved' => true])
                                </div>
                            </div>
                            <!-- end comments -->
                        </div>
                    </div>
                </div>
                <!-- end content tabs -->
            </div>
        </div>
    </div>
</section>
<!-- end content -->
@endsection
