<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand navbar-brand-logo" href="{{ url('/') }}">
            <div class="logo"><img src="{{ asset('img/Fichier_8.svg') }}" alt="" width="30" height="auto" class="d-inline-block align-top"></div>
            <div class="brand">Ramène Ta Fraise</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest --->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('favorites') }}">
                        <div id="fav">Favoris</div>
                        <div id="imfav"><img src="{{ asset('img/star.svg') }}" alt="" width="30" height="auto" class="d-inline-block align-top"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account') }}">
                        <div id="user">Mon compte</div>
                        <div><img src="{{ asset('img/user.svg') }}" alt="" width="30" height="auto" class="d-inline-block align-top"></div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
