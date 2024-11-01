<!DOCTYPE html>
<html lang="ja">
<head>
<title>関西巡り</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .hero-section {
        position: relative;
        padding: 100px 0;
        min-height: 100vh;
        background-color: #f8f9fa; /* デフォルトの背景色 */
    }

    .hero-section-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/background_image.jpg');
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .hero-section-bg.loaded {
        opacity: 1;
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
        background: linear-gradient(to bottom, #f8f9fa, #ffffff);
        padding: 80px 0;
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
        transition: transform 0.3s ease, box-shadow 0.3s ease;
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
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s ease forwards;
        padding: 30px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-top: -20px;
        position: relative;
    }

    .team-skills .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
        margin: 3px;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .team-skills .badge:hover {
        background-color: #e9ecef;
        transform: translateY(-2px);
    }

    .row.align-items-center {
        margin-bottom: 100px;
    }

    .team-info h3 {
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .team-info .text-primary {
        color: #3498db !important;
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
</style>
</head>
<body>
<a href="/login" class="btn btn-outline-dark login-btn">
    <i class="bi bi-person"></i> ログイン
</a>

<div class="hero-section">
    <div class="hero-section-bg"></div>
    <div class="hero-content text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                関西巡り
                <small class="d-block display-6 mt-2" style="font-family: 'Noto Serif JP', serif;">
                    ～伝統と文化の旅～
                </small>
            </h1>
            <p class="lead fs-4 mb-5" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">
                歴史ある寺社仏閣から現代の観光スポットまで<br>
                あなただけの関西旅行プランを作りましょう
            </p>
            <a href="/Place" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow">
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
                            効率的な���程を組み立て、思い出に残る旅行を計画できます。
                        </span>
                    </p>
                    <button class="read-more-btn" data-target="moreText1">
                        <i class="bi bi-chevron-down"></i> もっと見る
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card feature-card h-100 shadow">
                <img src="{{ asset('images/home2.png') }}" class="feature-image" alt="プラン作成">
                <div class="card-body">
                    <h3 class="card-title h4">プラン作成</h3>
                    <p class="card-text">
                        当サイトでは旅のプランを簡単に作成し、保存することができます。
                        <span class="more-text" id="moreText2">
                            マップ機能や、他のユーザーとの共有機能も利用できます。
                        </span>
                    </p>
                    <button class="read-more-btn" data-target="moreText2">
                        <i class="bi bi-chevron-down"></i> もっと見る
                    </button>
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
                    <button class="read-more-btn" data-target="moreText3">
                        <i class="bi bi-chevron-down"></i> もっと見る
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team-section py-5 mt-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">開発チーム</h2>

        <!-- メンバー1: 画像左、テキスト右 -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home1.png') }}" alt="Team Member 1"
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

        <!-- メンバー2: 画像右、テキスト左 -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 order-md-2">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home1.png') }}" alt="Team Member 2"
                        class="img-fluid rounded shadow-lg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="team-info p-4">
                    <h3 class="h4 mb-3">ホイ</h3>
                    <p class="text-primary mb-3">バックエンド担当</p>
                    <p class="lead mb-4">
                        データベース設計、API実装を担当。
                        セキュアで効率的なシステム構築を目指しました。
                    </p>
                    <div class="team-skills">
                        <span class="badge bg-light text-dark me-2 mb-2">PHP</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Laravel</span>
                        <span class="badge bg-light text-dark me-2 mb-2">MySQL</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- メンバー3: 画像左、テキスト右 -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home1.png') }}" alt="Team Member 3"
                        class="img-fluid rounded shadow-lg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="team-info p-4">
                    <h3 class="h4 mb-3">ミン</h3>
                    <p class="text-primary mb-3">イベント担当</p>
                    <p class="lead mb-4">
                        イベント情報の収集と管理機能を担当。
                        最新の情報をリアルタイムで提供できる仕組みを実装しました。
                    </p>
                    <div class="team-skills">
                        <span class="badge bg-light text-dark me-2 mb-2">API開発</span>
                        <span class="badge bg-light text-dark me-2 mb-2">データ管理</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Laravel</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- メンバー4: 画像右、テキスト左 -->
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <div class="team-image-wrapper">
                    <img src="{{ asset('images/home1.png') }}" alt="Team Member 4"
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
<script>
    document.querySelectorAll('.read-more-btn').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const moreText = document.getElementById(targetId);
            moreText.classList.toggle('show');

            const icon = this.querySelector('i');
            if (moreText.classList.contains('show')) {
                this.innerHTML = '<i class="bi bi-chevron-up"></i> 閉じる';
            } else {
                this.innerHTML = '<i class="bi bi-chevron-down"></i> もっと見る';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.3
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.team-section .row.align-items-center').forEach(row => {
            observer.observe(row);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const bg = document.querySelector('.hero-section-bg');
        bg.classList.add('loaded');
    });
</script>
</body>
</html>
