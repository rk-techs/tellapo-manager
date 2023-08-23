<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Google Material Symbols --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    {{-- Styles --}}
    @vite('resources/sass/style.scss')
</head>
<body>

    @include('components.header')

    @yield('content')

    @include('components.mask', ['maskId' => 'pageMask'])

    @stack('script')
</body>
</html>
