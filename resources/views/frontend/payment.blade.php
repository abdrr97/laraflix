@extends('frontend.layouts.master')

@section('content')


<!-- page title -->
<section class="section section--first section--bg" data-bg="{{ asset('frontend/img/section/section.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title">Pricing</h2>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="#">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Pricing</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<!-- pricing -->
<div class="section">
    <div class="container">
        <div class="row">
            <!-- plan features -->
            <div class="col-12">
                <ul class="row plan-features">
                    <li class="col-12 col-md-6 col-lg-4">1 month unlimited access!</li>
                    <li class="col-12 col-md-6 col-lg-4">Stream on your phone, laptop, tablet or TV.</li>
                    <li class="col-12 col-md-6 col-lg-4">1 month unlimited access!</li>
                    <li class="col-12 col-md-6 col-lg-4">Thousands of TV shows, movies & more.</li>
                    <li class="col-12 col-md-6 col-lg-4">You can even Download & watch offline.</li>
                    <li class="col-12 col-md-6 col-lg-4">Thousands of TV shows, movies & more.</li>
                </ul>
            </div>
            <!-- end plan features -->

            <!-- price -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="price">
                    <div class="price__item price__item--first"><span>Basic</span> <span>Free</span></div>
                    <div class="price__item"><span>7 days</span></div>
                    <div class="price__item"><span>720p Resolution</span></div>
                    <div class="price__item"><span>Limited Availability</span></div>
                    <div class="price__item"><span>Desktop Only</span></div>
                    <div class="price__item"><span>Limited Support</span></div>
                    <a href="#" class="price__btn">Choose Plan</a>
                </div>
            </div>
            <!-- end price -->

            <!-- price -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="price price--premium">
                    <div class="price__item price__item--first"><span>Premium</span> <span>$19.99</span></div>
                    <div class="price__item"><span>1 Month</span></div>
                    <div class="price__item"><span>Full HD</span></div>
                    <div class="price__item"><span>Lifetime Availability</span></div>
                    <div class="price__item"><span>TV & Desktop</span></div>
                    <div class="price__item"><span>24/7 Support</span></div>
                    <a href="#" class="price__btn">Choose Plan</a>
                </div>
            </div>
            <!-- end price -->

            <!-- price -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="price">
                    <div class="price__item price__item--first"><span>Cinematic</span> <span>$39.99</span></div>
                    <div class="price__item"><span>2 Months</span></div>
                    <div class="price__item"><span>Ultra HD</span></div>
                    <div class="price__item"><span>Lifetime Availability</span></div>
                    <div class="price__item"><span>Any Device</span></div>
                    <div class="price__item"><span>24/7 Support</span></div>
                    <a href="#" class="price__btn">Choose Plan</a>
                </div>
            </div>
            <!-- end price -->
        </div>
    </div>
</div>
<!-- end pricing -->
<div class="container">
    <h1 class="text-white">payment</h1>
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label for="card-holder-name">Card Name</label>
                <input class="form-control" id="card-holder-name" type="text" placeholder="card name">
            </div>

            <div class="form-group">
                <label for="plan">Select A Plan</label>
                <select class="form-control" name="plan" id="plan">
                    @foreach($plans as $key => $plan)
                    <option value="{{ $key }}">{{ $plan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Stripe Elements Placeholder -->
            <div id="card-element" class="form-group"></div>

            <button id="card-button" class="btn btn-primary " data-secret="{{ $intent->client_secret }}">
                Update Payment Method
            </button>
        </div>
    </div>
</div>
<!-- features -->
<section class="section section--dark">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-12">
                <h2 class="section__title section__title--no-margin">Our Features</h2>
            </div>
            <!-- end section title -->

            <!-- feature -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature">
                    <i class="icon ion-ios-tv feature__icon"></i>
                    <h3 class="feature__title">Ultra HD</h3>
                    <p class="feature__text">If you are going to use a passage of Lorem Ipsum, you need to be sure there
                        isn't anything embarrassing hidden in the middle of text.</p>
                </div>
            </div>
            <!-- end feature -->

            <!-- feature -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature">
                    <i class="icon ion-ios-film feature__icon"></i>
                    <h3 class="feature__title">Film</h3>
                    <p class="feature__text">All the Lorem Ipsum generators on the Internet tend to repeat predefined
                        chunks as necessary, making this the first.</p>
                </div>
            </div>
            <!-- end feature -->

            <!-- feature -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature">
                    <i class="icon ion-ios-trophy feature__icon"></i>
                    <h3 class="feature__title">Awards</h3>
                    <p class="feature__text">It to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining.</p>
                </div>
            </div>
            <!-- end feature -->

            <!-- feature -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature">
                    <i class="icon ion-ios-notifications feature__icon"></i>
                    <h3 class="feature__title">Notifications</h3>
                    <p class="feature__text">Various versions have evolved over the years, sometimes by accident,
                        sometimes on purpose.</p>
                </div>
            </div>
            <!-- end feature -->

            <!-- feature -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature">
                    <i class="icon ion-ios-rocket feature__icon"></i>
                    <h3 class="feature__title">Rocket</h3>
                    <p class="feature__text">It to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting.</p>
                </div>
            </div>
            <!-- end feature -->

            <!-- feature -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature">
                    <i class="icon ion-ios-globe feature__icon"></i>
                    <h3 class="feature__title">Multi Language Subtitles </h3>
                    <p class="feature__text">Various versions have evolved over the years, sometimes by accident,
                        sometimes on purpose.</p>
                </div>
            </div>
            <!-- end feature -->
        </div>
    </div>
</section>
<!-- end features -->
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
    $(document).ready(function () {

        const stripe = Stripe('pk_test_o4s6hprVpP0CKRPVYGT4ns9800VoJwXG4o');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {
            let plan_id = $('#plan').val();
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );
            if (error) {
                console.log(error.message);
            } else {
                $.ajax({
                    url: '/subscribe',
                    type: 'post',
                    data: {
                        plan_id: plan_id,
                        payment_method: setupIntent.payment_method,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function (data) {
                        window.location.href = data.success_url;
                    }
                });
            }
        });
    });

</script>
@endsection
