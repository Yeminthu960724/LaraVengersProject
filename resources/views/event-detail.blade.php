<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event['title'] }} - イベント詳細</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event-detail.css') }}">
</head>
<body>
    <header id="header"></header>

    <main>
        <div class="container">
            <div class="content-card">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ $event['image_url'] }}" alt="{{ $event['title'] }}"
                            class="img-fluid rounded shadow-sm mb-4" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $event['title'] }}</h1>

                        <div class="status-badge
                            @if($event['status'] === '開催予定') bg-info
                            @elseif($event['status'] === '開催中') bg-success
                            @else bg-secondary
                            @endif text-white">
                            {{ $event['status'] }}
                        </div>

                        <div class="event-info">
                            <p>
                                <i class="bi bi-calendar-event me-2"></i>
                                開催期間：{{ \Carbon\Carbon::parse($event['start_date'])->format('Y年m月d日') }}
                                @if($event['start_date'] !== $event['end_date'])
                                    ～ {{ \Carbon\Carbon::parse($event['end_date'])->format('Y年m月d日') }}
                                @endif
                            </p>

                            <p>
                                <i class="bi bi-geo-alt me-2"></i>
                                開催場所：{{ $event['location'] }}
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($event['location']) }}"
                                class="btn btn-map btn-sm btn-outline-primary ms-2"
                                target="_blank">
                                    <i class="bi bi-map"></i> 地図を見る
                                </a>
                            </p>

                            <p>
                                <i class="bi bi-tag me-2"></i>
                                カテゴリー：{{ $event['category'] }}
                            </p>
                        </div>

                        <div class="event-description mt-4">
                            <h2>イベント詳細</h2>
                            <p>{{ $event['description'] }}</p>
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
    <script src="{{ asset('js/eventDetail.js') }}"></script>
</body>
</html>
