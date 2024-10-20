<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>

<body>
    <!-- Header Section -->
    <header id="header"></header>

    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <main>
        <div class="container">
            <h2>天王寺動物園</h2>
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://i0.wp.com/travo.guide/wp-content/uploads/2019/08/%E5%A4%A9%E7%8E%8B%E5%AF%BA%E5%8B%95%E7%89%A9%E5%9C%92%E5%9C%B0%E5%9C%96-e1564649044129.jpg?w=1261&ssl=1"
                                    class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <p>天王寺動物園は、大阪市にある歴史ある動物園で、1915年に開園しました。総面積は約11ヘクタールあり、約180種類、1000頭以上の動物が飼育されています。</p>
                        <p>園内はアフリカサバンナやアジアの森林など、動物たちの自然環境を再現したエリアが設けられ、動物の生態を身近に感じられるよう工夫されています。</p>
                        <p>特に人気の高い動物は、ライオン、ゾウ、キリン、ホッキョクグマなどで、動物の食事タイムや触れ合いイベントも定期的に開催されています。</p>
                        <p>また、天王寺公園に隣接しており、都会の中で自然と触れ合える癒しの場所としても親しまれています。</p>
                    </div>
                </div>
            </div>
            <div>
                <p>開園時間：9:30～17:00 　5・9月の土日祝日は～18:00　※いずれも入園は一時間前まで</p>
                <p>休園日：月曜日（祝日の場合は翌日）、年末年始（12月29日～1月1日）</p>
                <a href="https://www.tennojizoo.jp/">公式サイト：https://www.tennojizoo.jp/</a>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.1428282254187!2d135.5084344!3d34.6510957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000ddf5c4955555%3A0x1a80ffc5f37ea293!2z5aSp546L5a-65YuV54mp5ZyS!5e0!3m2!1sja!2sjp!4v1728754437414!5m2!1sja!2sjp"
                width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <button>カードに入れる</button>
        </div>
    </main>

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>

</html>
