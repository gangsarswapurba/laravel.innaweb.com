<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="Jamaluddin Rumi">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="apple-touch-icon" sizes="57x57" href="{{ url('img/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ url('img/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ url('img/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ url('img/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ url('img/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ url('img/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ url('img/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ url('img/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('img/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('img/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ url('img/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ url('img/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ url('img/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        <!-- pace js -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/white/pace-theme-minimal.min.css" integrity="sha512-A5dCeiLW7J62FnMqLDpTc1cAOGJUXWk/vSLcAApzIA4jNvSuWd8zZYEQEFtK3Yr+gg42l3L4dG7uchifMruFwQ==" crossorigin="anonymous" />
        <!-- google fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <!-- summernote -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
        <!-- chartjs -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

        <!-- app css -->
        @php $css_created_time = filemtime(public_path('css/app.css')) @endphp
        <link href="{{ asset('css/app.css') . '?v=' . $css_created_time }}" rel="stylesheet">
    </head>
    <body class="">
        <header class="main-header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
                <a class="navbar-brand" href="{{ url('') }}/"><img src="{{ url('/img/algostudio.svg') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        @guest
                            <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ route('login') }}">
                                <button type="button" class="btn btn-light btn-block">{{ __('Login') }}</button>
                            </a>
                            @if (Route::has('register'))
                                <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ route('register') }}">
                                    <button type="button" class="btn btn-light btn-block">{{ __('Register') }}</button>
                                </a>
                            @endif
                        @else
                            <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ url('/') }}">
                                <button type="button" class="btn btn-light btn-block">Dashboard</button>
                            </a>
                            <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ url('/product') }}">
                                <button type="button" class="btn btn-light btn-block">Produk</button>
                            </a>
                            <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ url('/order') }}">
                                <button type="button" class="btn btn-light btn-block">Penjualan</button>
                            </a>
                            <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                <button type="button" class="btn btn-light btn-block">Logout</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                        @endguest
                    </div>
                </div>
            </nav>
        </header>

        @yield('alert')

        <main class="main-container {{ request()->is('login') || request()->is('register') ? 'my-5 mx-3 mx-sm-5 py-3 py-sm-5 px-0' : 'p-3 p-sm-3 p-md-5 p-lg-5 mx-2 my-3 m-sm-3 m-md-5 l-lg-5 shadow' }}">
            @yield('content')
        </main>

        @yield('modal')

        <footer class="page-footer font-small">
            <div class="footer-copyright text-center py-3">
                <p class="font-weight-light mb-0">
                    <span>show me your love by starring me at </span> <a href="https://github.com/jamaluddinrumi/laravel"><i class="fab fa-github"></i> GitHub</a>
                </p>
            </div>
        </footer>

        <!-- pace js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js" integrity="sha512-ePSfiGQMIzYzXVQLqWoVC3yxVEHIM5Y3EGh9jPNxpf+hPuLtzPdxJX+lTC3ziPMlDgc5OsM4JThxGwN2DkWEeA==" crossorigin="anonymous"></script>
        <!-- app js -->
        @php $js_created_time = filemtime(public_path('js/app.js')) @endphp
        <script src="{{ asset('js/app.js') . '?v=' . $js_created_time }}" defer></script>
        <!-- jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
        <!-- datatables -->
        <script src="https://cdn.datatables.net/v/bs4/dt-1.10.21/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
        <!-- summernote -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.min.js"></script>
        <!-- chartjs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
        <!-- bootstrap-input-spinner -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.13.19/src/bootstrap-input-spinner.min.js"></script>
        <!-- instant.page -->
        <script src="https://instant.page/5.1.0" type="module" integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>

    </body>
</html>
