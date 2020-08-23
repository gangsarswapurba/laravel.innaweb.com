<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
            <a class="navbar-brand" href="{{ url('') }}/"><img src="{{ url('/img/algostudio.svg') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ url('/') }}">
                    <button type="button" class="btn btn-light">Dashboard</button>
                    </a>
                    <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ url('/product') }}">
                    <button type="button" class="btn btn-light">Produk</button>
                    </a>
                    <a class="nav-item nav-link {{ Route::currentRouteName() }}" href="{{ url('/order') }}">
                    <button type="button" class="btn btn-light">Penjualan</button>
                    </a>
                </div>
            </div>
        </nav>