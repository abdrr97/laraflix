<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- SEO --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('frontend.layouts.includes.styles')
    @yield('styles')

</head>

<body class="body">

    @include('frontend.layouts.includes.nav')

    @yield('content')

    @include('frontend.layouts.includes.footer')

    @include('frontend.layouts.includes.scripts')
    @yield('scripts')
</body>

</html>
