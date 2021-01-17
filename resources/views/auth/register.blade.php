@extends('auth.master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="sign__content">
                <form method="POST" action="{{ route('register') }}" class="sign__form">
                    @csrf
                    <a style="text-decoration: none;color: white;" href="{{ route('browse.home') }}" class="sign__logo">
                        <h1>Laraflix</h1>
                    </a>
                    <div class="sign__group">
                        <input placeholder="username" id="username" type="text" value="{{ old('username') }}" class="sign__input" name="username" required>
                    </div>

                    <div class="sign__group">
                        <input placeholder="email@example.com" id="email" type="email" class="sign__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>

                    <div class="sign__group">
                        <input placeholder="password" id="password" type="password" class="sign__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>
                    <div class="sign__group">
                        <input placeholder="confirme Password" id="password-confirm" type="password" class="sign__input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="sign__group sign__group--checkbox">
                        <input id="remember" name="remember" type="checkbox">
                        {{-- TODO: get this to work --}}
                        <label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
                    </div>

                    <button class="sign__btn" type="submit">Sign up</button>

                    <span class="sign__text">Already have an account? <a href="{{ url('login') }}">Sign in!</a></span>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
