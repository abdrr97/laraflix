@extends('frontend.layouts.master')

@section('content')

<!-- page title -->
<section class="section section--first section--bg" data-bg="img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title">{{ $page->title }}</h2>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="{{ url('/browse') }}">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">{{ $page->title }}</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<!-- privacy -->
<section class="section" style="background: #fff;">
    <div class="container">
        <div class="row">
            <!-- section text -->
            <div class="col-12">
                {!! $page->body !!}
            </div>
            <!-- end section text -->
        </div>
    </div>
</section>
<!-- end privacy -->
@endsection
