<!doctype html>
<html>
<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
            <a class="navbar-brand" href="{{ url('') }}/"><img src="{{ url('/img/algostudio.svg') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="{{ url('/') }}">
                    <button type="button" class="btn btn-light">Dashboard</button>
                    </a>
                    <a class="nav-item nav-link" href="{{ url('/product') }}">
                    <button type="button" class="btn btn-light">Produk</button>
                    </a>
                    <a class="nav-item nav-link" href="{{ url('/order') }}">
                    <button type="button" class="btn btn-light">Penjualan</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>