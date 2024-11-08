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
            background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
            color: white;
            min-height: 100vh;
        }

        main {
            padding-top: 100px;
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
            background-color: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: #1B4B8F;
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: #333;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        /* ボタンのスタイル */
        .btn-outline-primary {
            color: #1B4B8F !important;
            border-color: #1B4B8F !important;
            background-color: transparent;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #1B4B8F !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(27, 75, 143, 0.2);
        }

        .btn-primary {
            background-color: #1B4B8F !important;
            border: none;
            color: white !important;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #154178 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(27, 75, 143, 0.3);
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

        .card {
            transform: translateY(0);
            transition: all 0.3s ease !important;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
        }

        .btn-outline-primary:hover {
            background-color: #1B4B8F !important;
            color: white !important;
            border-color: #1B4B8F !important;
        }

        .btn-primary:hover {
            background-color: #154178 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(27, 75, 143, 0.2);
        }

        .card-img-top {
            transition: all 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        /* カード内のアイコンとテキスト */
        .card i {
            color: #1B4B8F;
        }

        .card p {
            color: #666 !important;
            font-size: 0.9rem;
        }

        /* ボタンコンテナ */
        .d-flex.gap-2.mt-auto {
            margin-top: 1rem;
        }

        /* バッジのスタイル */
        .badge.bg-primary {
            background-color: #1B4B8F !important;
            font-weight: 500;
            padding: 0.5em 1em;
            border-radius: 30px;
            font-size: 0.8rem;
        }

        /* 日付とロケーション情報のスタイル */
        .card .date-info,
        .card .location-info {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #794848 !important;
            margin-bottom: 8px;
        }

        .card .bi-calendar,
        .card .bi-geo-alt {
            color: #1B4B8F;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header id="header"></header>

    <main>
        <div class="container">
            <!-- ヘッダーセクション -->
            <div class="text-center mb-5 animate__animated animate__fadeIn">
                <h1 class="display-4 fw-bold"
                    style="font-size: 3.5rem;
                           letter-spacing: 0.05em;
                           margin-bottom: 1rem;
                           background: linear-gradient(45deg, #ffffff, #e0e0e0);
                           -webkit-background-clip: text;
                           -webkit-text-fill-color: transparent;
                           text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);">
                    イベント情報
                </h1>
            </div>

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
                        <option value="wakayama">和歌山</option>
                        <option value="shiga">滋賀</option>
                        <option value="hyogo">兵庫</option>
                        <option value="otsu">大津</option>
                        <option value="himeji">姫路</option>
                        <option value="nishinomiya">西宮</option>
                        <option value="amagasaki">尼崎</option>
                        <option value="kishiwada">岸和田</option>
                        <option value="ise">伊勢</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="category" class="form-select">
                        <option value="">カテゴリーを選択</option>
                        <option value="祭り">祭り</option>
                        <option value="花火大会">花火大会</option>
                        <option value="グルメ">グルメ</option>
                        <option value="音楽">音楽</option>
                        <option value="イルミネーション">イルミネーション</option>
                        <option value="伝統行事">伝統行事</option>
                        <option value="アート">アート</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="自然">自然</option>
                        <option value="文化">文化</option>
                        <option value="マルシェ">マルシェ</option>
                        <option value="体験">体験</option>
                        <option value="展示">展示</option>
                        <option value="パフォーマンス">パフォーマンス</option>
                        <option value="ライトアップ">ライトアップ</option>
                        <option value="フェスティバル">フェスティバル</option>
                        <option value="ワークショップ">ワークショップ</option>
                        <option value="マーケット">マーケット</option>
                        <option value="パレード">パレード</option>
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
        </div>
    </main>

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
                    <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #e8f4ff 100%); border: none; border-radius: 25px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                        <div class="position-relative">
                            <img src="${event.image_url}" class="card-img-top" alt="${event.title}"
                                 style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge" style="background-color: #1B4B8F; font-size: 0.8rem; padding: 0.5em 1em; border-radius: 30px;">
                                    ${event.category}
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column" style="padding: 1.5rem; background: linear-gradient(135deg, #ffffff 0%, #e8f4ff 100%);">
                            <h5 class="card-title" style="color: #1B4B8F; font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem;">
                                ${event.title}
                            </h5>
                            <p class="card-text" style="color: #333; font-size: 0.95rem; line-height: 1.6; flex-grow: 1;">
                                ${event.description}
                            </p>
                            <div class="mt-3">
                                <p class="mb-2" style="display: flex; align-items: center; gap: 8px;">
                                    <i class="bi bi-calendar me-2" style="color: #1B4B8F;"></i>
                                    <span style="color: #1B4B8F; font-weight: 600;">開催期間:</span>
                                    <span style="color: #333; font-weight: 500;">
                                        ${event.date || `${event.start_date} ～ ${event.end_date}`}
                                    </span>
                                </p>
                                <p class="mb-3" style="display: flex; align-items: center; gap: 8px;">
                                    <i class="bi bi-geo-alt me-2" style="color: #1B4B8F;"></i>
                                    <span style="color: #333; font-weight: 500;">${event.location}</span>
                                </p>
                                <div class="d-flex gap-2 mt-auto">
                                    <a href="/Event/${event.id}"
                                       class="btn btn-outline-primary flex-grow-1"
                                       style="border-radius: 30px; padding: 8px 20px; font-weight: 600; border-color: #1B4B8F; color: #1B4B8F; transition: all 0.3s ease;">
                                        <i class="bi bi-info-circle me-1"></i> 詳細を見る
                                    </a>
                                    <button onclick="addToCart(${JSON.stringify(event)})"
                                            class="btn btn-primary flex-grow-1"
                                            style="border-radius: 30px; padding: 8px 20px; font-weight: 600; background-color: #1B4B8F; border: none; transition: all 0.3s ease;">
                                        <i class="bi bi-cart-plus me-1"></i> カートに追加
                                    </button>
                                </div>
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
