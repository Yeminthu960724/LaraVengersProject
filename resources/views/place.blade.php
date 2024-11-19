<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <aside class="filter-sidebar">
                        <h3>絞り込み検索</h3>
                        <form>
                            <div>
                                <h4>カテゴリー</h4>
                                <label><input type="checkbox" name="characteristics" value="お寺"> お寺</label><br>
                                <label><input type="checkbox" name="characteristics" value="買い物"> 買い物</label><br>
                                <label><input type="checkbox" name="characteristics" value="自然"> 自然</label><br>
                                <label><input type="checkbox" name="characteristics" value="風景"> 風景</label><br>
                                <label><input type="checkbox" name="characteristics" value="建築"> 建築</label><br>
                                <label><input type="checkbox" name="characteristics" value="公園"> 公園</label><br>
                                <label><input type="checkbox" name="characteristics" value="植物園"> 植物園</label><br>
                                <label><input type="checkbox" name="characteristics" value="水族館"> 水族館</label><br>
                                <label><input type="checkbox" name="characteristics" value="動物園"> 動物園</label><br>
                                <label><input type="checkbox" name="characteristics" value="博物館"> 博物館</label><br>
                                <label><input type="checkbox" name="characteristics" value="美術館"> 美術館</label><br>
                                <label><input type="checkbox" name="characteristics" value="遊園地"> 遊園地</label><br>
                            </div>
                            <div>
                                <h4>エリア</h4>
                                <label><input type="checkbox" name="location " value="大阪府"> 大阪府</label><br>
                                <label><input type="checkbox" name="location " value="京都府"> 京都府</label><br>
                                <label><input type="checkbox" name="location " value="神戶市"> 神戶市</label><br>
                                <label><input type="checkbox" name="location " value="奈良県"> 奈良県</label><br>
                                <label><input type="checkbox" name="location " value="滋賀県"> 滋賀県</label><br>
                                <label><input type="checkbox" name="location " value="姫路市"> 姫路市</label><br>
                            </div>
                            <button type="button" id="filterButton">絞り込み</button>
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
                                            <a href="{{ route('Place.show', $place->placeNumber) }}" class="btn btn-primary">詳細</a>
                                            <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="placeId" value="{{ $place->placeNumber }}">
                                                <button type="submit" class="btn btn-primary">カードに入れる</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                <div class="pagination-container">
                    {{ $places->links() }}
                </div>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/place.js') }}"></script>
</body>

</html>
