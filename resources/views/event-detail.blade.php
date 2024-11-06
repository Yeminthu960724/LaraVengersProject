<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event['title'] }} - イベント詳細</title>
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

        /* パンくずリスト */
        .breadcrumb {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: white;
        }

        /* イベント詳細カード */
        .event-detail {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .event-detail img {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .event-detail h1 {
            color: white;
            margin-bottom: 1rem;
        }

        .event-info {
            color: rgba(255, 255, 255, 0.9);
        }

        .event-info i {
            color: rgba(255, 255, 255, 0.8);
        }

        .event-description p {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* ステータスバッジ */
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* ボタン */
        .btn-outline-primary {
            color: white;
            border-color: rgba(255, 255, 255, 0.5);
        }

        .btn-outline-primary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
        }

        .btn-primary {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .btn-outline-secondary {
            color: rgba(255, 255, 255, 0.9);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .btn-outline-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-color: white;
        }

        /* モーダル */
        .modal-content {
            background-color: #1a237e;
            color: white;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
        }
    </style>
</head>
<body>
    <header id="header"></header>

    <main class="container py-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Event">イベント一覧</a></li>
                <li class="breadcrumb-item active">{{ $event['title'] }}</li>
            </ol>
        </nav>

        <div class="event-detail">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $event['image_url'] }}" alt="{{ $event['title'] }}"
                        class="img-fluid rounded shadow-sm mb-4" style="width: 100%; height: 300px; object-fit: cover;">
                </div>
                <div class="col-md-6">
                    <h1 class="mb-3">{{ $event['title'] }}</h1>

                    <div class="status-badge mb-3
                        @if($event['status'] === '開催予定') bg-info
                        @elseif($event['status'] === '開催中') bg-success
                        @else bg-secondary
                        @endif text-white px-3 py-1 rounded-pill d-inline-block">
                        {{ $event['status'] }}
                    </div>

                    <div class="event-info">
                        <p class="mb-3">
                            <i class="bi bi-calendar-event me-2"></i>
                            開催期間：{{ \Carbon\Carbon::parse($event['start_date'])->format('Y年m月d日') }}
                            @if($event['start_date'] !== $event['end_date'])
                                ～ {{ \Carbon\Carbon::parse($event['end_date'])->format('Y年m月d日') }}
                            @endif
                        </p>

                        <p class="mb-3">
                            <i class="bi bi-geo-alt me-2"></i>
                            開催場所：{{ $event['location'] }}
                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($event['location']) }}"
                            class="btn btn-sm btn-outline-primary ms-2"
                            target="_blank">
                                <i class="bi bi-map"></i> 地図を見る
                            </a>
                        </p>

                        <p class="mb-3">
                            <i class="bi bi-tag me-2"></i>
                            カテゴリー：{{ $event['category'] }}
                        </p>
                    </div>

                    <div class="event-description mt-4">
                        <h2 class="h5 mb-3">イベント詳細</h2>
                        <p class="text-muted">{{ $event['description'] }}</p>
                    </div>

                    <div class="mt-4 d-flex gap-3">
                        <button onclick="addToCart({{ json_encode($event) }})" class="btn btn-primary">
                            <i class="bi bi-cart-plus me-2"></i>カートに追加
                        </button>
                        <a href="/Event" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>イベント一覧に戻る
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
            // イベントの詳細情報を追加
            event.details = {
                start_date: '{{ $event['start_date'] }}',
                end_date: '{{ $event['end_date'] }}',
                status: '{{ $event['status'] }}',
                location: '{{ $event['location'] }}',
                category: '{{ $event['category'] }}',
                description: '{{ $event['description'] }}',
                access_info: '最寄り駅からのアクセス情報',
                price: '入場料や参加費用の情報',
                organizer: 'イベント主催者情報',
                contact: '連絡先情報',
                website: 'イベントの公式サイトURL'
            };
            event.type = 'event';  // イベントタイプを明示

            // 現在のカートの内容を取得
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');

            // イベントをカートに追加
            cart.push(event);

            // カートを保存
            localStorage.setItem('cart', JSON.stringify(cart));

            // カートの数を更新
            updateCartCount();

            // モーダルを表示
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

        // ページ読み込み時にカート数を更新
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
</body>
</html>
