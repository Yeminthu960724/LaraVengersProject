<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プラン - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
            color: white;
            min-height: 100vh;
        }

        main {
            padding-top: 80px;
        }

        /* タイトルスタイル */
        h2 {
            font-size: 2.5rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* カードのスタイル */
        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            color: #1B4B8F;
            font-weight: 600;
        }

        .card-text {
            color: #333;
        }

        .card-img-fixed {
            height: 200px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.6s ease;
        }

        .card:hover .card-img-fixed {
            transform: scale(1.05);
        }

        /* アニメーション */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 各カードに遅延を設定 */
        .col:nth-child(1) .card { animation-delay: 0.1s; }
        .col:nth-child(2) .card { animation-delay: 0.2s; }
        .col:nth-child(3) .card { animation-delay: 0.3s; }
        .col:nth-child(4) .card { animation-delay: 0.4s; }

        /* ボタンのスタイル */
        .btn-primary {
            background-color: #1B4B8F;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #154178;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(27, 75, 143, 0.3);
        }
    </style>
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
                <h2>定番プラン</h2>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp"
                            class="card-img-top card-img-fixed card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">ミンのプラン</h5>
                            <p class="card-text">大阪一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">サンのプラン</h5>
                            <p class="card-text">神戸一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">タムのプラン</h5>
                            <p class="card-text">京都一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://img.rurubu.jp/img_srw/andmore/images/0000470187/bOrNpVYpgqcmW22RtTfJGdOpfahZ53skyj05kdFR.jpg"
                            class="card-img-top card-img-fixed" alt="">
                        <div class="card-body">
                            <h5 class="card-title">ホイのプラン</h5>
                            <p class="card-text">奈良一日遊び</p>
                            <a href="PlanDetail" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>

    <footer id="footer"></footer>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
