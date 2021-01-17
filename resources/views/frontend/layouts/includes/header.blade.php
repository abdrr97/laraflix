<!-- page title -->
<section class="section section--first section--bg" data-bg="{{ asset('frontend/img/section/section.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title text-uppercase">{{ $current_page }}</h2>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="{{ route('browse.home') }}">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">{{ $current_page }}</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
