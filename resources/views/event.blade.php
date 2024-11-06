<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
            color: white;
            min-height: 100vh;
        }

        .container {
            padding-top: 2rem;
        }

        /* 検索フィルターのスタイル */
        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            backdrop-filter: blur(10px);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus, .form-select:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
        }

        /* カードのスタイル */
        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            color: white;
        }

        .card-text {
            color: rgba(255, 255, 255, 0.9);
        }

        .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        /* ボタンのスタイル */
        .btn-outline-primary {
            color: white;
            border-color: rgba(255, 255, 255, 0.5);
        }

        .btn-outline-primary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: white;
        }

        .btn-primary {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
        }

        .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* ローディングとno-resultsのスタイル */
        .spinner-border {
            color: white;
        }

        #no-results .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        /* セレクトボックスのスタイルを追加 */
        .form-select {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            backdrop-filter: blur(10px);
        }

        .form-select option {
            background-color: #1a237e;  /* オプションの背景色 */
            color: white;  /* オプションのテキスト色 */
        }

        .form-select:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
        }

        /* プレースホルダーの色も調整 */
        .form-select::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <header id="header"></header>

    <main class="container py-4">
        <h1 class="mb-4 text-white">イベント情報</h1>

        <!-- 検索フィルター -->
        <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" id="keyword" class="form-control" placeholder="キーワードで検索">
            </div>
            <div class="col-md-4">
                <select id="area" class="form-select">
                    <option value="">エリアを選択</option>
                    <option value="osaka">大阪</option>
                    <option value="kyoto">京都</option>
                    <option value="kobe">神戸</option>
                    <option value="nara">奈良</option>
                </select>
            </div>
            <div class="col-md-4">
                <select id="category" class="form-select">
                    <option value="">カテゴリーを選択</option>
                    <option value="祭り">祭り</option>
                    <option value="花火大会">花火大会</option>
                    <option value="グルメ">グルメ</option>
                    <option value="音楽">音楽</option>
                </select>
            </div>
        </div>

        <!-- イベント一覧 -->
        <div id="event-list" class="row row-cols-1 row-cols-md-3 g-4">
            <!-- イベントカードがここに動的に挿入されます -->
        </div>

        <!-- ローディング表示 -->
        <div id="loading" class="text-center py-4 d-none">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- 検索結果なしの表示 -->
        <div id="no-results" class="text-center py-4 d-none">
            <p class="text-muted">該当するイベントが見つかりませんでした。</p>
        </div>
    </main>

    <!-- カート追加モーダル -->
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">カートに追加しました</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    イベントをカートに追加しました。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">続けて見る</button>
                    <a href="/Cart" class="btn btn-primary">カートを見る</a>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script>
        function addToCart(event) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            event.type = 'event';  // イベントタイプを追加
            cart.push(event);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            const modal = new bootstrap.Modal(document.getElementById('cartModal'));
            modal.show();
        }

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = cart.length;
            }
        }

        function createEventCard(event) {
            return `
                <div class="col">
                    <div class="card h-100">
                        <img src="${event.image_url}" class="card-img-top" alt="${event.title}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">${event.title}</h5>
                            <p class="card-text">${event.description}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i> ${new Date(event.start_date).toLocaleDateString('ja-JP')}
                                </small>
                            </p>
                            <div class="d-flex gap-2">
                                <a href="/Event/${event.id}" class="btn btn-outline-primary">
                                    <i class="bi bi-info-circle"></i> 詳細
                                </a>
                                <button onclick="addToCart(${JSON.stringify(event)})" class="btn btn-primary">
                                    <i class="bi bi-cart-plus"></i> カートに追加
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // 既存のrefreshEvents関数はそのまま使用
    </script>
    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>
