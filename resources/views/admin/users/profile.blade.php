@extends('frontend.layouts.master')

@section('content')
<!-- page title -->
<section class="section section--first section--bg" data-bg="{{ asset('frontend/img/section/section.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title">My FlixGo</h2>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="{{ url('browse') }}">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Profile</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<!-- content -->
<div class="content">
    <!-- profile -->
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="profile__content">
                        <div class="profile__user">
                            <div class="profile__avatar">
                                @if(isset($user->profile_image) && $user->profile_image != 'avatar.png')
                                <img class="rounded mx-auto d-block m-5" width="150px"
                                    src="{{ asset('storage/users/'.$user->id.'/images/'.$user->profile_image) }}"
                                    alt="{{ $user->profile_image }}">
                                @else
                                <img class="rounded mx-auto d-block m-5" width="150px"
                                    src="{{ asset('storage/'.$user->profile_image) }}" alt="{{ $user->profile_image }}">
                                @endif
                            </div>
                            <div class="profile__meta">
                                <h3>{{ $user->username }}</h3>
                                <span>
                                    {{ $user->firstname ? 'FlixGo ID:'.$user->firstname.' '.$user->lastname: '' }}
                                </span>
                            </div>
                        </div>

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs content__tabs--profile" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                    aria-controls="tab-1" aria-selected="true">
                                    Profile
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                                    aria-selected="false">Subscription</a>
                            </li> --}}
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs content__mobile-tabs--profile" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Profile">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab"
                                            aria-controls="tab-1" aria-selected="true">
                                            Profile
                                        </a>
                                    </li>

                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab"
                                            aria-controls="tab-2" aria-selected="false">
                                            Subscription
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->


                        <a class="profile__logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end profile -->

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="row">
                    <!-- details form -->
                    <div class="col-12 col-lg-6">
                        <form method="POST" action="{{ route('admin.user.update',['user'=>$user]) }}"
                            enctype="multipart/form-data" class="profile__form">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="profile__title">Profile details</h4>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="profile__group">
                                        <label class="profile__label" for="username">Username</label>
                                        <input value="{{ $user->username }}" id="username" type="text" name="username"
                                            class="profile__input" placeholder="User 123">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="profile__group">
                                        <label class="profile__label" for="email">Email</label>
                                        <input value="{{ $user->email }}" id="email" type="text" name="email"
                                            class="profile__input" placeholder="email@email.com">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="profile__group">
                                        <label class="profile__label" for="firstname">First Name</label>
                                        <input value="{{ $user->firstname ?? '' }}" id="firstname" type="text"
                                            name="firstname" class="profile__input" placeholder="firstname">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="profile__group">
                                        <label class="profile__label" for="lastname">Last Name</label>
                                        <input value="{{ $user->lastname ?? '' }}" id="lastname" type="text"
                                            name="lastname" class="profile__input" placeholder="lastname">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="profile__btn" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end details form -->

                    <!-- password form -->
                    <div class="col-12 col-lg-6">
                        {{-- TODO:refactor --}}
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('admin.user.changepassword',['user'=>$user]) }}"
                            class="profile__form">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="profile__title">Change password</h4>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="profile__group">
                                        <label class="profile__label" for="current-password">Old Password</label>
                                        <input id="current-password" type="password" name="current-password"
                                            class="profile__input">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="profile__group">
                                        <label class="profile__label" for="password">New Password</label>
                                        <input id="password" type="password" name="password" class="profile__input">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                    <div class="profile__group">
                                        <label class="profile__label" for="password_confirmation">Confirm New
                                            Password</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            class="profile__input">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="profile__btn" type="submit">Change</button>
                                </div>
                            </div>
                        </form>

                        @if ($errors->has('current-password'))
                        <span class="help-block ">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                        @endif
                        @if ($errors->has('password'))
                        <span class="help-block text-white">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                    </div>
                    <!-- end password form -->
                </div>
            </div>

        </div>
        <!-- end content tabs -->
    </div>
</div>
<!-- end content -->
{{--
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Profile</div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update',['user'=>$user]) }}" enctype="multipart/form-data"
method="post">
@csrf
@method('PUT')

@if(isset($user->profile_image) && $user->profile_image != 'avatar.png')
<img class="rounded mx-auto d-block m-5" width="150px"
    src="{{ asset('storage/users/'.$user->id.'/images/'.$user->profile_image) }}" alt="{{ $user->profile_image }}">
@else
<img class="rounded mx-auto d-block m-5" width="150px" src="{{ asset('storage/'.$user->profile_image) }}"
    alt="{{ $user->profile_image }}">
@endif

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="profile_image">profile_image</label>

    <div class="col-md-6">

        <input type="file" class="form-control" id="profile_image" value="{{$user->profile_image }}"
            name="profile_image">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="username">username</label>
    <div class="col-md-6">
        <input disabled type="text" class="form-control" id="username" value="{{'@'.$user->username }}" name="username">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="firstname">firstname</label>
    <div class="col-md-6">
        <input type="text" class="form-control" id="firstname" value="{{ $user->firstname }}" name="firstname">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="lastname">lastname</label>
    <div class="col-md-6">
        <input type="text" class="form-control" id="lastname" value="{{ $user->lastname }}" name="lastname">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="bio">bio</label>
    <div class="col-md-6">
        <textarea class="form-control" name="bio" id="bio" cols="30" rows="10">{{ $user->bio }} </textarea>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="email">email</label>
    <div class="col-md-6">
        <input type="text" class="form-control" id="email" value="{{ $user->email }}" name="email">
    </div>
</div>
<button class="btn btn-success" type="submit"> Update </button>
</form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
