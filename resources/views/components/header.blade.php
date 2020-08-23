<!doctype html>
<html>
<head lang="{{ config('app.locale') }}">
    <title>{{ config('app.name') }}</title>
    @include('/components/favicon')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header class="main-header">
        @include('/components/menu')
    </header>
