<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関西巡り</title>
    <link rel="stylesheet" href="common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>

<body>
    <!-- Header Section -->
    <header id="header"></header>

    <!-- Navigation Bar -->
    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <!-- Main Content Section -->
    <main>
        <div class="container">
            <div class="row">
                <h1>観光地の紹介</h1>
            </div>
            <!-- <aside class="filter-sidebar">
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
        </aside> -->


            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <a href="placeDetail.html"><img
                                src="https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp"
                                class="card-img-top card-img-fixed card-img-fixed" alt=""></a>
                        <div class="card-body">
                            <h5 class="card-title">天王寺動物園</h5>
                            <p class="card-text">天王寺公園で特に人気の動物園。サバンナから熱帯雨林までさまざまな環境に生息する 200 種以上の動物たちを展示。</p>
                            <a href="placeDetail.html" class="btn btn-primary">詳細</a>
                            <a href="#" class="btn btn-primary">カードに入れる</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">万博記念公園</h5>
                            <p class="card-text">博物館、スタジアム、太陽の塔がある 1970 年の万博会場にある公園。</p>
                            <a href="placeDetail.html" class="btn btn-primary">詳細</a>
                            <a href="#" class="btn btn-primary">カードに入れる</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">万博記念公園</h5>
                            <p class="card-text">博物館、スタジアム、太陽の塔がある 1970 年の万博会場にある公園。</p>
                            <a href="placeDetail.html" class="btn btn-primary">詳細</a>
                            <a href="#" class="btn btn-primary">カードに入れる</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">万博記念公園</h5>
                            <p class="card-text">博物館、スタジアム、太陽の塔がある 1970 年の万博会場にある公園。</p>
                            <a href="placeDetail.html" class="btn btn-primary">詳細</a>
                            <a href="#" class="btn btn-primary">カードに入れる</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>
    <script src="common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/common.js') }}"></script>

</body>

</html>
