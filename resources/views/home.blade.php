<!DOCTYPE html>
<html lang="ja">
<head>
<title>関西巡り</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
            <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeIn">
                関西巡り
                <small class="d-block display-6 mt-2 animate__animated animate__fadeIn animate__delay-1s">
                    ～伝統と文化の旅～
                </small>
            </h1>
            <p class="lead fs-4 mb-5 animate__animated animate__fadeIn animate__delay-2s">
                歴史ある寺社仏閣から現代の観光スポットまで<br>
                あなただけの関西旅行プランを作りましょう
            </p>
            <a href="/Place" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow animate__animated animate__fadeIn animate__delay-3s hover-float">
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
<script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
