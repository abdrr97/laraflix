@extends('auth.master')

@section('content')

<div class="container">



    <div class="row">
        <div class="col-12">
            <div class="sign__content">
                <form method="POST" action="{{ route('login') }}" class="sign__form">
                    @csrf
                    <a style="text-decoration: none;color: white;" href="/browse" class="sign__logo">
                        <h1>Laraflix</h1>
                    </a>

                    <div class="sign__group">
                        <input type="text" class="sign__input @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') ?? 'abdrr97@gmail.com' }}" autocomplete="email" name="email" autofocus id="email" type="email">

                    </div>

                    <div class="sign__group">
                        <input id="password" placeholder="Password" type="password" class="sign__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="password">
                    </div>

                    <div class="sign__group sign__group--checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember Me</label>
                    </div>

                    <button class="sign__btn" type="submit">Sign in</button>

                    <span class="sign__text">
                        Don't have an account?
                        <a href="{{ url('register') }}">Sign up!</a>
                    </span>

                    @if (Route::has('password.request'))
                    <span class="sign__text">
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </span>
                    @endif
                </form>
                <!-- end authorization form -->
            </div>
        </div>
    </div>
</div>

@endsection
