<!doctype html>
<html>
<head lang="{{ config('app.locale') }}">
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jamaluddin Rumi">
    @include('/components/favicon')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header class="main-header">
        @include('/components/menu')
    </header>
