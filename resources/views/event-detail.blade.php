<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event['title'] }} - イベント詳細</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
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

                    <div class="mt-4">
                        <a href="/Event" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>イベント一覧に戻る
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
