<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '関西巡り')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    <i class="bi bi-compass"></i> 関西巡り
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="{{ route('Place.index') }}">
                                <i class="bi bi-map"></i> 観光地
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="{{ route('event') }}">
                                <i class="bi bi-calendar-event"></i> イベント
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="">
                                <i class="bi bi-journal-text"></i> プラン
                            </a>
                        </li>
                    </ul>

                    <!-- 検索フォームを改善 -->
                    <div class="search-box me-3">
                        <div class="search-wrapper">
                            <i class="bi bi-search search-icon"></i>
                            <input type="search" class="search-input" placeholder="観光地を検索...">
                        </div>
                    </div>

                    <div class="nav-item">
                        <a href="{{ route('cart.view')}}" class="nav-link cart-button me-2">
                            <i class="bi bi-cart3"></i>
                            <span>カート</span>
                            <span class="cart-count">0</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link login-button">
                            <i class="bi bi-person-circle"></i>
                            <span>ログイン</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    @yield('content')

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/place.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>

</body>

</html>
