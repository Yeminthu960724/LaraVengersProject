<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>

<body>
    <header id="header"></header>

    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <h1>観光地の紹介</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-3">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <aside class="filter-sidebar">
                        <h3>絞り込み検索</h3>
                        <form>
                            <div>
                                <h4>カテゴリー</h4>
                                <label><input type="checkbox"> 動物園</label><br>
                                <label><input type="checkbox"> 公園</label><br>
                                <label><input type="checkbox"> 美術館</label><br>
                            </div>
                            <div>
                                <h4>エリア</h4>
                                <label><input type="checkbox"> 大阪</label><br>
                                <label><input type="checkbox"> 京都</label><br>
                                <label><input type="checkbox"> 神戸</label><br>
                            </div>
                            <button type="submit">絞り込み</button>
                        </form>
                    </aside>
                </div>

                <!-- Cards -->
                <div class="col-md-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($post->take(15) as $place)
                        <div class="col">
                            <div class="card">
                                <img src="https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp"
                                     class="card-img-top"
                                     style="height: 150px; object-fit: cover; width: 100%;"
                                     alt="{{$place->placeName}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$place->placeName}}</h5>
                                    <p class="card-text">{{$place->shortDetail}}</p>
                                    <div class="d-flex gap-2">
                                        <a href="PlaceDetail" class="btn btn-outline-primary">詳細</a>
                                        <button onclick="addToCart({
                                            id: '{{$place->placeName}}',
                                            title: '{{$place->placeName}}',
                                            description: '{{$place->shortDetail}}',
                                            image_url: 'https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp',
                                            location: '大阪',
                                            category: '観光施設',
                                            type: 'place'
                                        })" class="btn btn-primary">
                                            <i class="bi bi-cart-plus"></i> カートに追加
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

</body>

</html>
