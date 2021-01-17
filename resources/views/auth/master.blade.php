<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- SEO --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @include('frontend.layouts.includes.styles')

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body class="body">
    <div class="sign section--bg" data-bg="frontend/img/section/section.jpg">

        @yield('content')

    </div>
    @include('frontend.layouts.includes.scripts')

</body>

</html>
