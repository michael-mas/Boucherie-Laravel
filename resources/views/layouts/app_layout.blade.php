<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" href="/images/ZestyIcon.svg"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='description' content='@yield('description')'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('user.css')
    @yield('stylesheets')
</head>

@include('user.navbar')

    <section>
        <div id="outer-container">
            @yield('content')
        </div>
    </section>
</body>
@include('user.footer')
@include('user.script')
</html>
