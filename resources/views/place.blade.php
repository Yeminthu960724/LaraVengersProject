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
                        <div class="filter-content-wrapper">
                            <h3 class="filter-title">
                                <i class="bi bi-funnel-fill me-2"></i>
                                絞り込み検索
                            </h3>

                            <div class="filter-sections-container">
                                <!-- カテゴリーセクション -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h4>
                                            <i class="bi bi-grid me-2"></i>
                                            カテゴリー
                                        </h4>
                                    </div>
                                    <div class="filter-content">
                                        <div class="filter-options">
                                            <div class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="filter-checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="label-text">動物園</span>
                                                    <span class="count">12</span>
                                                </label>
                                            </div>
                                            <div class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="filter-checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="label-text">公園</span>
                                                    <span class="count">8</span>
                                                </label>
                                            </div>
                                            <div class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="filter-checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="label-text">美術館</span>
                                                    <span class="count">15</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- エリアセクション -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h4>
                                            <i class="bi bi-geo-alt me-2"></i>
                                            エリア
                                        </h4>
                                    </div>
                                    <div class="filter-content">
                                        <div class="filter-options">
                                            <div class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="filter-checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="label-text">大阪</span>
                                                    <span class="count">20</span>
                                                </label>
                                            </div>
                                            <div class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="filter-checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="label-text">京都</span>
                                                    <span class="count">15</span>
                                                </label>
                                            </div>
                                            <div class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="filter-checkbox">
                                                    <span class="checkmark"></span>
                                                    <span class="label-text">神戸</span>
                                                    <span class="count">10</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="search-btn">
                                <i class="bi bi-search me-2"></i>
                                検索する
                            </button>
                        </div>
                    </aside>
                </div>

                <!-- Cards -->
                <div class="col-md-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4" style="min-height: calc(100vh - 280px);">
                        @foreach ($post as $place)
                        <div class="col">
                            <div class="card h-100"
                                 data-category="{{ $place->category ?? '動物園' }}"
                                 data-area="{{ $place->area ?? '大阪' }}">
                                <img src="https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp"
                                     class="card-img-top"
                                     style="height: 200px; object-fit: cover; width: 100%;"
                                     alt="{{$place->placeName}}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title" style="font-size: 1.2rem; margin-bottom: 0.75rem;">{{$place->placeName}}</h5>
                                    <div class="d-flex gap-2 mt-auto">
                                        <a href="/PlaceDetail" class="btn btn-outline-primary btn-sm" style="z-index: 1;">詳細</a>
                                        <button onclick="addToCart({
                                            id: '{{$place->placeName}}',
                                            title: '{{$place->placeName}}',
                                            description: '{{$place->shortDetail}}',
                                            image_url: 'https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp',
                                            location: '大阪',
                                            category: '観光施設',
                                            type: 'place'
                                        })" class="btn btn-primary btn-sm" style="z-index: 1;">
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

    <style>
        body {
            background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
            height: calc(100% - 10px);
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 15px;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .card:hover::after {
            opacity: 1;
        }

        .card-title {
            color: #1B4B8F;
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .card-text {
            color: #333;
            font-size: 0.95rem;
            line-height: 1.6;
            font-weight: 400;
        }

        .card-img-top {
            transition: transform 0.6s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        /* カードのフェードインアニメーション */
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
        .col:nth-child(5) .card { animation-delay: 0.5s; }
        .col:nth-child(6) .card { animation-delay: 0.6s; }
        .col:nth-child(7) .card { animation-delay: 0.7s; }
        .col:nth-child(8) .card { animation-delay: 0.8s; }
        .col:nth-child(9) .card { animation-delay: 0.9s; }
        .col:nth-child(10) .card { animation-delay: 1.0s; }
        .col:nth-child(11) .card { animation-delay: 1.1s; }
        .col:nth-child(12) .card { animation-delay: 1.2s; }
        .col:nth-child(13) .card { animation-delay: 1.2s; }
        .col:nth-child(14) .card { animation-delay: 1.2s; }

        /* ボタンのスタイル改善 */
        .btn-outline-primary {
            color: #1B4B8F;
            border-color: #1B4B8F;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #1B4B8F;
            color: white;
            transform: translateY(-2px);
        }

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

        /* 既存のスタイル */

        /* 高さ調整用のスタイル追加 */
        .filter-sidebar {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: all 0.3s ease;
        }

        .row.row-cols-1.row-cols-md-3 {
            min-height: calc(100vh - 280px);
        }

        /* スクロールバーのスタイル */
        .filter-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .filter-sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .filter-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .filter-sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* タイトルのテキストシャドウ追加 */
        h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* ナビゲーションバーのスタイルを追加 */
        .navbar {
            background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
            backdrop-filter: blur(10px);
            box-shadow: none;
            border: none;
            padding: 1rem 0;
        }

        /* ブランドロゴ */
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.4rem;
        }

        .navbar-brand i {
            margin-right: 8px;
            color: rgba(255, 255, 255, 0.9);
        }

        /* メニュンク */
        .nav-link.main-menu {
            color: white !important;
            font-weight: 500;
            padding: 10px 20px;
            transition: all 0.3s ease;
            border: none !important;
            background: none;
        }

        .nav-link.main-menu:hover {
            color: rgba(255, 255, 255, 0.8) !important;
            transform: translateY(-2px);
        }

        /* 検索フォーム */
        .search-wrapper {
            position: relative;
            width: 300px;
        }

        .search-input {
            padding: 10px 40px 10px 20px;
            border-radius: 25px;
            background-color: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-input:focus {
            background-color: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
            color: white;
        }

        .search-button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            color: white;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        /* ログインボタン */
        .login-button {
            background-color: rgba(255, 255, 255, 0.15);
            color: white !important;
            padding: 8px 20px !important;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-button:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .login-button i {
            font-size: 1.2rem;
        }

        /* レスポンシブ対応 */
        @media (max-width: 991.98px) {
            .search-wrapper {
                width: 100%;
                margin: 10px 0;
            }
        }

        /* ハンバーガーメニュー */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.7%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* ナビゲーションのカードとログインボタンの修正 */
        .nav-link.main-menu {
            color: #ffffff !important;
            font-size: 1.1rem;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 8px 20px !important;
            margin: 0 5px;
        }

        .nav-link.main-menu:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* グインボタンの修正 */
        .login-button {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 10px 25px !important;
            border-radius: 25px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .login-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .login-button i {
            font-size: 1.2rem;
            margin-right: 8px;
            color: #ffffff;
        }

        .login-button span {
            color: #ffffff !important;
            font-weight: 600;
        }

        /* ナビゲーションバー全体の調整 */
        .navbar {
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #ffffff !important;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        /* 絞り込み検索の拡大 */
        .filter-sidebar {
            padding: 2rem !important;
            min-height: 600px;
        }

        .filter-sidebar h3 {
            font-size: 1.8rem !important;
            margin-bottom: 2rem !important;
        }

        .filter-sidebar h4 {
            font-size: 1.4rem !important;
            margin-bottom: 1.5rem !important;
        }

        /* チックボックスのサイズ調整 */
        .custom-checkbox {
            padding: 10px 35px;
            margin: 0;
            transition: background-color 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .custom-checkbox:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .filter-header:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .checkmark {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            height: 18px;
            width: 18px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        .custom-checkbox input:checked ~ .checkmark {
            background-color: #1B4B8F;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 6px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        .section-icon {
            transition: transform 0.3s ease;
        }

        .section-icon.rotated {
            transform: rotate(90deg);
        }

        .filter-content {
            transition: all 0.3s ease;
        }

        .filter-sidebar {
            transition: all 0.3s ease;
        }

        .filter-section {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 20px;
        }

        .filter-header {
            transition: all 0.3s ease;
        }

        .filter-header:hover {
            opacity: 0.8;
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: white;
            position: relative;
        }

        .filter-option:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .custom-checkbox {
            display: none;
        }

        .checkmark {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 4px;
            margin-right: 12px;
            position: relative;
            transition: all 0.2s ease;
        }

        .custom-checkbox:checked + .checkmark {
            background: #4B8EC8;
            border-color: #4B8EC8;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 6px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        .section-icon {
            transition: transform 0.3s ease;
        }

        .section-icon.rotated {
            transform: rotate(90deg);
        }

        .filter-content {
            transition: all 0.3s ease;
        }

        .filter-sidebar {
            transition: all 0.3s ease;
        }

        .filter-section {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 20px;
        }

        .filter-header {
            transition: all 0.3s ease;
        }

        .filter-header:hover {
            opacity: 0.8;
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: white;
            position: relative;
        }

        .filter-option:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .custom-checkbox {
            display: none;
        }

        .checkmark {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 4px;
            margin-right: 12px;
            position: relative;
            flex-shrink: 0;
            top: 0;
            transform: none;
        }

        .custom-checkbox:checked + .checkmark {
            background: #4B8EC8;
            border-color: #4B8EC8;
        }

        .checkmark:after {
            content: '';
            position: absolute;
            left: 5px;
            top: 2px;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .label-text {
            flex-grow: 1;
            font-size: 1rem;
        }

        .count {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .search-btn {
            width: 100%;
            padding: 10px 15px;
            background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
            border: none;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(27, 75, 143, 0.2);
            cursor: pointer;
            letter-spacing: 1px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(27, 75, 143, 0.3);
            background: linear-gradient(135deg, #5499d1 0%, #1f5cb0 100%);
        }

        .search-btn:active {
            transform: translateY(1px);
            box-shadow: 0 2px 10px rgba(27, 75, 143, 0.2);
        }

        .search-btn i {
            font-size: 1.1rem;
        }

        .transition-transform {
            transition: transform 0.3s ease;
        }

        .bi-chevron-down.active {
            transform: rotate(180deg);
        }

        /* フィルターサイドバーの基本スタイル */
        .filter-sidebar {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: all 0.3s ease;
        }

        /* タイトル */
        .filter-title {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: white;
            font-weight: 600;
        }

        /* セクションヘッダー */
        .filter-header h4 {
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
            margin: 0;
            display: flex;
            align-items: center;
        }

        /* ラベルと��ウント */
        .label-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
            margin-right: 8px;
        }

        .count {
            background: rgba(255, 255, 255, 0.15);
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        /* 検索ボタン */
        .search-btn {
            font-size: 0.9rem;
            padding: 8px;
        }

        /* フィルターアイテムの高さ調整 */
        .filter-item {
            min-height: 36px;
        }

        .filter-label {
            min-height: 32px;
        }

        /* カードコンテナの高さ調整 */
        .row.row-cols-1.row-cols-md-3.g-4 {
            margin: 20px 0;
            padding-top: 5px;
        }

        /* カードと絞り込み検索のヘッダー位置を揃える */
        .filter-sidebar {
            margin-top: 30px; /* カードと同じ高さに合わせる */
        }

        .row.row-cols-1.row-cols-md-3.g-4 {
            margin-top: 30px; /* 絞り込み検索と同じ高さに合わせる */
        }
    </style>

    <script>
        function addToCart(place) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart.push(place);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            alert('カートに追加しました');
        }

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = cart.length;
            }
        }

        function toggleFilter() {
            const filterContent = document.getElementById('filterContent');
            const filterIcon = document.getElementById('filterIcon');

            filterContent.classList.toggle('collapsed');
            filterIcon.classList.toggle('rotated');
        }

        function toggleSection(sectionId) {
            const content = document.getElementById(sectionId);
            const header = content.previousElementSibling;

            // トグル
            content.classList.toggle('show');
            header.classList.toggle('active');

            // アニメーション用の高さ設定
            if (content.classList.contains('show')) {
                content.style.maxHeight = content.scrollHeight + "px";
            } else {
                content.style.maxHeight = "0";
            }
        }

        // 初期状態で開いておく場合は以下をコメントアウト
        /*
        document.addEventListener('DOMContentLoaded', () => {
            const sections = ['category-section', 'area-section'];
            sections.forEach(sectionId => {
                const content = document.getElementById(sectionId);
                const header = content.previousElementSibling;

                content.classList.add('show');
                header.classList.add('active');
                content.style.maxHeight = content.scrollHeight + "px";
            });
        });
        */
    </script>

</body>

</html>
