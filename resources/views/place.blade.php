@include('layouts.common')

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">

</head>

<body>
    <header id="header"></header>

    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <main style="background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%); min-height: 100vh; padding-top: 80px;">
        <div class="container">
            <!-- ヘッダーセクション -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-white"
                    style="font-size: 3.5rem;
                           letter-spacing: 0.05em;
                           margin-bottom: 2rem;
                           background: linear-gradient(45deg, #ffffff, #e0e0e0);
                           -webkit-background-clip: text;
                           -webkit-text-fill-color: transparent;
                           text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);">
                    観光地の紹介
                </h1>
            </div>

            <!-- @if (session('success'))
                <div id="alert-message"
                    class="alert alert-success position-fixed top-50 start-50 translate-middle p-2 text-center"
                    style="z-index: 1050; display: inline-block; white-space: nowrap;">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div id="alert-message"
                    class="alert alert-success position-fixed top-50 start-50 translate-middle p-2 text-center"
                    style="z-index: 1050; display: inline-block; white-space: nowrap;">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('cartCount'))
                <script>
                    document.querySelector('.cart-count').textContent = {{ session('cartCount') }};
                </script>
            @endif  -->

            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <aside class="filter-sidebar">
                        <h3>絞り込み検索</h3>
                        <form method="GET" action="{{ route('Place.index') }}">
                            <div>
                                <h4>カテゴリー</h4>
                                @foreach (['お寺', '買い物', '自然', '風景', '建築', '公園', '植物園', '水族館', '動物園', '博物館', '美術館', '遊園地'] as $characteristic)
                                    <label>
                                        <input type="checkbox" name="characteristics[]" value="{{ $characteristic }}"
                                            {{ in_array($characteristic, request('characteristics', [])) ? 'checked' : '' }}>
                                        {{ $characteristic }}
                                    </label>
                                @endforeach
                            </div>
                            <div>
                                <h4>エリア</h4>
                                @foreach (['大阪府', '京都府', '神戶市', '奈良県', '滋賀県', '姫路市'] as $location)
                                    <label>
                                        <input type="checkbox" name="location[]" value="{{ $location }}"
                                            {{ in_array($location, request('location', [])) ? 'checked' : '' }}>
                                        {{ $location }}
                                    </label>
                                @endforeach
                            </div>
                            <button type="submit" class="filter-button">
                                <i class="bi bi-funnel-fill"></i>
                                絞り込み検索
                            </button>
                        </form>

                    </aside>
                </div>

                <!-- Cards -->
                <div class="col-md-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="posts">
                        @foreach ($places as $place)
                            <div class="col" data-location ="{{ $place->location }}" data-characteristics="{{ $place->characteristics }}">
                                <div class="card">
                                    <a href="/PlaceDetail">
                                        <img src="{{$place->im1}}" class="card-img-top card-img-fixed" alt="">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $place->placeName }}</h5>
                                        <p class="card-text">{{ $place->shortDetail }}</p>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('Place.show', $place->placeNumber) }}" class="btn-details">詳細</a>
                                            <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                                @csrf
                                                <input type="hidden" name="placeId" value="{{ $place->placeNumber }}">
                                                <button type="submit"  class="add-to-cart-btn">カートに追加</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <!-- ページネーション -->
                    <div class="pagination-container">
                        <div class="pagination-wrapper">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($places->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $places->appends(request()->query())->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($places->getUrlRange(1, $places->lastPage()) as $page => $url)
                                    <li class="page-item {{ $places->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $places->appends(request()->query())->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($places->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $places->appends(request()->query())->nextPageUrl() }}">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                                <div class="total-count" style="font-size: 1.2em; font-weight: bold;color:#ffffff">
                                    全{{ $places->total() }}件
                                </div>
                            </ul>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </main>

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/addtocart.js') }}"></script>
    @include('components.footer')

</body>

</html>
