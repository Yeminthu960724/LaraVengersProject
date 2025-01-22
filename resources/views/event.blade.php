@include('layouts.common')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>イベント - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">

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

            <!-- イベント一覧 -->
            <div id="event-list" class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($events as $event)
                <div class="col">
                    <div class="card h-100">
                        <div class="position-relative">
                            <img src="{{ $event->image_url }}" class="card-img-top" alt="{{ $event->title }}"
                                 style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge" style="background-color: #1B4B8F;">
                                    {{ $event->category }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <div class="mt-3">
                                <p class="mb-2">
                                    <i class="bi bi-calendar me-2"></i>
                                    開催期間: {{ $event->start_date }} ～ {{ $event->end_date}}
                                </p>
                                <p class="mb-2">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {{ $event->location }}
                                </p>
                                <p class="mb-2">
                                    <i class="bi bi-tag me-2"></i>
                                    料金: {{ $event->price === 0 ? '無料' : number_format($event->price) . '円' }}
                                </p>
                            </div>
                            <div class="d-flex gap-2 mt-auto">
                                <a href="{{ route('Event.show', $event->id) }}" class="btn btn-outline-primary flex-grow-1">
                                    <i class="bi bi-info-circle me-1"></i> 詳細を見る
                                </a>
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="eventId" value="{{ $event->id }}">
                                    <button type="submit" class="btn btn-primary flex-grow-1">カートに追加</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
    <script src="{{ asset('js/addtocart.js') }}"></script>
</body>
</html>
