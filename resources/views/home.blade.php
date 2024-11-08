<!DOCTYPE html>
<html lang="ja">
<head>
<title>関西巡り</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    /* メインの背景色 */
    body {
        background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
        color: white;
    }

    .hero-section {
        position: relative;
        padding: 100px 0;
        min-height: 100vh;
        background: transparent;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        color: white;
    }

    .feature-card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease;
        overflow: hidden;
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }

    .feature-card:hover {
        transform: translateY(-10px);
    }

    .feature-image {
        height: 200px;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
    }

    .read-more-btn {
        color: #0d6efd;
        background: none;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        text-decoration: underline;
        transition: color 0.3s ease;
    }

    .read-more-btn:hover {
        color: #0a58ca;
    }

    .login-btn {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 25px;
        padding: 8px 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: transform 0.3s ease;
    }

    .login-btn:hover {
        transform: translateY(-2px);
    }

    .more-text {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .more-text.show {
        max-height: 200px;
    }

    .team-section {
        background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
        color: white;
        padding: 80px 0;
        margin-top: 40px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        backdrop-filter: blur(10px);
    }

    .team-card {
        min-height: 100vh;
        display: flex;
        align-items: center;
        transition: opacity 0.3s ease;
        scroll-snap-align: start;
    }

    .team-cards {
        scroll-snap-type: y mandatory;
        overflow-y: scroll;
        height: 100vh;
    }

    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        animation: bounce 2s infinite;
    }

    .scroll-indicator i {
        font-size: 24px;
        color: #6c757d;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }

    .team-avatar img {
        border: 5px solid #fff;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .team-card:hover .team-avatar img {
        transform: scale(1.05);
    }

    .team-image-wrapper {
        transition: transform 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
        max-width: 250px;
        margin: 0 auto;
    }

    .team-image-wrapper img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .team-image-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .team-image-wrapper:hover img {
        transform: scale(1.05);
    }

    .team-info {
        background-color: rgba(255, 255, 255, 0.95);
        color: #333;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-top: -20px;
        position: relative;
    }

    .team-skills .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
        margin: 3px;
        background-color: #F5F2EB;
        border: 1px solid #BF8F30;
        color: #1B4B8F;
        transition: all 0.3s ease;
    }

    .team-skills .badge:hover {
        background-color: #BF8F30;
        color: white;
        transform: translateY(-2px);
    }

    .row.align-items-center {
        background-color: rgba(255, 255, 255, 0.15);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .team-info h3 {
        color: #1B4B8F;
    }

    .team-info .text-primary {
        color: #D64B29 !important;
    }

    .team-info .lead {
        font-size: 1rem;
        line-height: 1.6;
        color: #666;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .feature-card .card-title {
        color: white;
    }

    .feature-card .card-text {
        color: rgba(255, 255, 255, 0.9);
    }

    /* パーティクル効果のコンテナ */
    .hero-particles {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    /* 開発チームセクションのアニメーション */
    .team-member {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s ease;
    }

    .team-member.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* チームメンバーカードの3Dエフェクト */
    .row.align-items-center {
        transform-style: preserve-3d;
        perspective: 1000px;
        transition: transform 0.5s ease;
    }

    .row.align-items-center:hover {
        transform: translateY(-10px) rotateX(2deg);
    }

    /* チーム情報カードのホバーエフェクト */
    .team-info {
        transform: perspective(1000px) rotateY(0deg);
        transition: transform 0.6s ease;
        transform-style: preserve-3d;
    }

    .team-info:hover {
        transform: perspective(1000px) rotateY(5deg);
    }

    /* スキルバッジのアニメーション */
    .team-skills .badge {
        animation: skillBadge 2s ease infinite;
        animation-delay: calc(var(--delay) * 0.2s);
    }

    @keyframes skillBadge {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    /* アニメーション用クラス */
    .animate__animated {
        animation-duration: 1s;
    }

    .animate__delay-1s {
        animation-delay: 0.3s;
    }

    .animate__delay-2s {
        animation-delay: 0.6s;
    }

    .animate__delay-3s {
        animation-delay: 0.9s;
    }

    /* 背景アニメーション */
    .animated-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: linear-gradient(45deg, #4B8EC8, #1B4B8F);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* ナビゲーションバーのスタイルを更新 */
    .navbar {
        background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
        backdrop-filter: blur(10px);
        box-shadow: none;
        border: none;
        padding: 1rem 0;
    }

    .navbar-brand {
        font-weight: 700;
        color: white !important;
        font-size: 1.4rem;
    }

    .navbar-brand i {
        margin-right: 8px;
        color: rgba(255, 255, 255, 0.9);
    }

    /* メインメニューのリンクスタイル */
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

    /* 下線と関連する要素を完全に削除 */
    .nav-link.main-menu::after,
    .nav-link.main-menu::before,
    .nav-link.main-menu span {
        display: none !important;
    }

    /* スクロール時のスタイルも調整 */
    .navbar.scrolled {
        box-shadow: none;
        border: none;
    }

    /* ナビゲーションの下部の余分なスペースを削除 */
    .navbar .container {
        padding-bottom: 0;
        border-bottom: none;
    }

    /* ログインボタンのスタイル */
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

    /* ルートカードのスタイル */
    .route-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .route-card:hover {
        transform: translateY(-5px);
    }

    /* レビューカードのスタイル */
    .review-card {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .review-header img {
        width: 50px;
        height: 50px;
        margin-right: 15px;
    }

    .stars {
        color: #BF8F30;
    }

    /* 検索フォームのスタイル */
    .search-wrapper {
        position: relative;
        width: 300px;
    }

    .search-input {
        padding: 10px 40px 10px 20px;
        border-radius: 25px;
        border: 1px solid rgba(27, 75, 143, 0.2);
        background-color: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        width: 100%;
        transition: all 0.3s ease;
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
    }

    .search-input:focus {
        box-shadow: 0 0 0 2px rgba(27, 75, 143, 0.2);
        border-color: #1B4B8F;
        background-color: white;
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

    @media (max-width: 991.98px) {
        .search-wrapper {
            width: 100%;
            margin: 10px 0;
        }

        .search-input {
            width: 100%;
        }
    }

    /* ハンバーガーメニューの色を白に */
    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.7%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
</style>
</head>
<body>
<!-- ナビゲーションバーを修正 -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi bi-compass"></i> 関西巡り
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link main-menu" href="/Place">
                        <i class="bi bi-map"></i> 観光地
                        <span></span>
                    </a>
                </li>
            </ul>

            <!-- 検索フォームを追加 -->
            <form class="d-flex search-form me-3">
                <div class="search-wrapper">
                    <input type="search" class="form-control search-input" placeholder="観光地を検索...">
                    <button class="search-button" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <div class="nav-item">
                <a href="/login" class="nav-link login-button">
                    <i class="bi bi-person-circle"></i>
                    <span>ログイン</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="hero-section">
    <div class="animated-bg"></div>
    <div class="hero-particles" id="particles-js"></div>
    <div class="hero-content text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeIn"
                style="font-size: 6.5rem;
                       letter-spacing: 0.08em;
                       background: linear-gradient(45deg, #ffffff, #e0e0e0);
                       -webkit-background-clip: text;
                       -webkit-text-fill-color: transparent;
                       text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);">
                関西巡り
            </h1>

            <div class="subtitle mb-4 animate__animated animate__fadeIn animate__delay-1s"
                 style="font-size: 3rem;
                        font-weight: 500;
                        color: rgba(255, 255, 255, 0.95);
                        letter-spacing: 0.15em;
                        text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.3);
                        margin-top: 1.5rem;">
                ～伝統と文化の旅～
            </div>

            <p class="lead fs-4 mb-5 animate__animated animate__fadeIn animate__delay-2s"
               style="font-size: 2rem !important;
                      line-height: 2;
                      color: rgba(255, 255, 255, 0.9);
                      max-width: 800px;
                      margin: 0 auto;
                      text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.2);
                      letter-spacing: 0.05em;">
                歴史ある寺社仏閣から現代の観光スポットまで<br>
                あなただけの関西旅行プランを作りましょう
            </p>

            <a href="/Place"
               class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow animate__animated animate__fadeIn animate__delay-3s hover-float"
               style="font-size: 1.6rem;
                      font-weight: 600;
                      letter-spacing: 0.1em;
                      background: rgba(255, 255, 255, 0.95);
                      border: none;
                      transition: all 0.3s ease;">
                <i class="bi bi-compass"></i> 旅の計画を始める
            </a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card feature-card h-100 shadow">
                <img src="{{ asset('images/home1.png') }}" class="feature-image" alt="プラン作成">
                <div class="card-body">
                    <h3 class="card-title h4">プラン作成のガイドライン</h3>
                    <p class="card-text">
                        まず、訪れたい場所をいくつか選んでリストに追加しましょう。
                        <span class="more-text" id="moreText1">
                            効率的な程を組み立て、思い出に残る旅行を計画できます。
                        </span>
                    </p>
                    {{-- <button class="read-more-btn" data-target="moreText1">
                        <i class="bi bi-chevron-down"></i> もっと見る
                    </button> --}}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card feature-card h-100 shadow">
                <img src="{{ asset('images/home2.png') }}" class="feature-image" alt="プラン作成">
                <div class="card-body">
                    <h3 class="card-title h4">プラン作成</h3>
                    <p class="card-text">
                        当サイトでは旅のプランを簡単作成し、保存することができます。
                        <span class="more-text" id="moreText2">
                            マップ機能や、他のユーザーとの共有機能も利用できます。
                        </span>
                    </p>
                    {{-- <button class="read-more-btn" data-target="moreText2">
                        <i class="bi bi-chevron-down"></i> もっと見る
                    </button> --}}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card feature-card h-100 shadow">
                <img src="{{ asset('images/home3.png') }}" class="feature-image" alt="私ちについて">
                <div class="card-body">
                    <h3 class="card-title h4">私たちについて</h3>
                    <p class="card-text">
                        関西の魅力を多くの人に知ってもらいたいという思いで運営しています。
                        <span class="more-text" id="moreText3">
                            地域の情報を常に更新し、最新の観光情報を提供しています。
                        </span>
                    </p>
                    {{-- <button class="read-more-btn" data-target="moreText3">
                        <i class="bi bi-chevron-down"></i> もっと見る
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team-section py-5 mt-5">
    <div class="container">
        <h2 class="text-center mb-5 text-focus-in">開発チーム</h2>

        <!-- メンバー1: タム -->
        <div class="row align-items-center mb-5 team-member">
            <div class="col-md-6">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home1.png') }}" alt="タム"
                        class="img-fluid rounded shadow-lg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="team-info p-4">
                    <h3 class="h4 mb-3">タム</h3>
                    <p class="text-primary mb-3">フロントエンド担当</p>
                    <p class="lead mb-4">
                        ホームページ、観光地一覧ページの実装を担当。
                        ユーザー体験を重視したUI/UXデザインを心がけました。
                    </p>
                    <div class="team-skills">
                        <span class="badge bg-light text-dark me-2 mb-2">HTML/CSS</span>
                        <span class="badge bg-light text-dark me-2 mb-2">JavaScript</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- メンバー2: ホイ -->
        <div class="row align-items-center mb-5 team-member">
            <div class="col-md-6 order-md-2">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home2.png') }}" alt="ホイ"
                        class="img-fluid rounded shadow-lg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="team-info p-4">
                    <h3 class="h4 mb-3">ホイ</h3>
                    <p class="text-primary mb-3">バックエンド担当</p>
                    <p class="lead mb-4">
                        データベース設計、API実装を担当。
                        セキュア効率的なシステム構築を目指しました。
                    </p>
                    <div class="team-skills">
                        <span class="badge bg-light text-dark me-2 mb-2">PHP</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Laravel</span>
                        <span class="badge bg-light text-dark me-2 mb-2">MySQL</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- メンバー3: ミン -->
        <div class="row align-items-center mb-5 team-member">
            <div class="col-md-6">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home3.png') }}" alt="ミン"
                        class="img-fluid rounded shadow-lg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="team-info p-4">
                    <h3 class="h4 mb-3">ミン</h3>
                    <p class="text-primary mb-3">イベント担当</p>
                    <p class="lead mb-4">
                        イベント情報の収集と管理機能を担当。
                        最新の情報をリアルタイムで提供できる仕組みを実装しまた。
                    </p>
                    <div class="team-skills">
                        <span class="badge bg-light text-dark me-2 mb-2">API開発</span>
                        <span class="badge bg-light text-dark me-2 mb-2">データ管理</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Laravel</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- メンバー4: サン -->
        <div class="row align-items-center team-member">
            <div class="col-md-6 order-md-2">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home1.png') }}" alt="サン"
                        class="img-fluid rounded shadow-lg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="team-info p-4">
                    <h3 class="h4 mb-3">サン</h3>
                    <p class="text-primary mb-3">プラン作成担当</p>
                    <p class="lead mb-4">
                        旅行プラン作成機能を担当。
                        使いやすい計画ツールの開発に注力しました。
                    </p>
                    <div class="team-skills">
                        <span class="badge bg-light text-dark me-2 mb-2">UI設計</span>
                        <span class="badge bg-light text-dark me-2 mb-2">機能開発</span>
                        <span class="badge bg-light text-dark me-2 mb-2">テスト</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS('particles-js', {
        particles: {
            number: { value: 80 },
            color: { value: '#ffffff' },
            shape: { type: 'circle' },
            opacity: {
                value: 0.5,
                random: true
            },
            size: {
                value: 3,
                random: true
            },
            move: {
                enable: true,
                speed: 2,
                direction: 'none',
                random: true,
                out_mode: 'out'
            }
        },
        interactivity: {
            events: {
                onhover: {
                    enable: true,
                    mode: 'repulse'
                }
            }
        }
    });

    // スキルバッジにディレイを設定
    document.querySelectorAll('.team-skills .badge').forEach((badge, index) => {
        badge.style.setProperty('--delay', index);
    });

    // スクロルアニメーション
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.team-member').forEach(element => {
        observer.observe(element);
    });

    // マウス追従エフェクト
    document.querySelectorAll('.team-info').forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;

            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
        });
    });

    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
</body>
</html>
