@include('layouts.common')

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slideshow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/placeDetail.css') }}">
</head>

<body>
    <!-- Header Section -->
    <header id="header"></header>

    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <main>
        <div class="container">
            <h2>{{$place_detail->placeName}}</h2>
            <div class="content-card">
                <div class="row">
                    <!-- 左側：スライドショー -->
                    <div class="col-md-6">
                        <div class="slide-container">
                            <div class="slides">
                                <img src="{{$place_detail->im1}}" class="active">
                                <img src="{{$place_detail->im2}}">
                                <img src="{{$place_detail->im3}}">
                                <img src="{{$place_detail->im4}}">
                            </div>

                            <div class="buttons">
                                <span class="next">&#10095;</span>
                                <span class="prev">&#10094;</span>
                            </div>

                            <div class="dotsContainer">
                                <div class="dot active" attr='0' onclick="switchImage(this)"></div>
                                <div class="dot" attr='1' onclick="switchImage(this)"></div>
                                <div class="dot" attr='2' onclick="switchImage(this)"></div>
                                <div class="dot" attr='3' onclick="switchImage(this)"></div>
                                <div class="dot" attr='4' onclick="switchImage(this)"></div>
                            </div>
                        </div>
                    </div>

                    <!-- 右側：詳細情報 -->
                    <div class="col-md-6">
                        <div class="detail-section">
                            <div class="detail-content">
                                <h3>詳細紹介</h3>
                                <p>{{$place_detail->longDetail}}</p>

                                <!-- カートボタンを詳細の下に配置 -->
                                <div class="cart-button-container">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="placeId" value="{{ $place_detail->placeNumber }}">
                                        <button type="submit" class="cart-button">
                                            <i class="fas fa-shopping-cart"></i>
                                            カートに追加
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 営業時間とマップを横並びに -->
            <div class="row info-row">
                <div class="col-md-6">
                    <div class="content-card info-card">
                        <h3>営業情報</h3>
                        <div class="info-content">
                            <p><strong>営業時間：</strong>{{$place_detail->openningHours}}</p>
                            <p><strong>休館日：</strong>無休</p>
                            <a href="{{$place_detail->websiteLink}}" target="_blank" class="website-link">
                                <i class="fas fa-external-link-alt"></i> 公式サイトはこちら
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-card map-card">
                        <h3>アクセス</h3>
                        <div class="map-container">
                            {!! $place_detail->googleMapLink !!}
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
    <script src="{{ asset('js/slideshow.js') }}"></script>
</body>

</html>
