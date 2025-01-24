@include('layouts.common')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $event_detail->title}} - イベント詳細</title>
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
                        <img src="{{ $event_detail->image_url }}" alt="{{ $event_detail->title}}"
                            class="img-fluid rounded shadow-sm mb-4" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $event_detail->title }}</h1>

                        <div class="status-badge
                            @if($event_detail->status === '開催予定') bg-info
                            @elseif($event_detail->status === '開催中') bg-success
                            @else bg-secondary
                            @endif text-white">
                            {{ $event_detail->status }}
                        </div>

                        <div class="event-info">
                            <p>
                                <i class="bi bi-calendar-event me-2"></i>
                                @php
                                    $start_date = new \DateTime($event_detail->start_date);
                                    $end_date = new \DateTime($event_detail->end_date);
                                @endphp

                                開催期間：{{ $start_date->format('Y年m月d日') }}
                                @if($start_date != $end_date)
                                    ～ {{ $end_date->format('Y年m月d日') }}
                                @endif
                            </p>

                            <p>
                                <i class="bi bi-geo-alt me-2"></i>
                                開催場所：{{ $event_detail->location }}
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($event_detail->location) }}"
                                class="btn btn-map btn-sm btn-outline-primary ms-2"
                                target="_blank">
                                    <i class="bi bi-map"></i> 地図を見る
                                </a>
                            </p>

                            <p>
                                <i class="bi bi-tag me-2"></i>
                                カテゴリー：{{ $event_detail->category }}
                            </p>

                            <p>
                                <i class="bi bi-cash me-2"></i>
                                料金：{{ $event_detail->price === 0 ? '無料' : number_format($event_detail->price) . '円' }}
                            </p>

                            @if(isset($event_detail->access))
                            <p>
                                <i class="bi bi-train-front me-2"></i>
                                アクセス：{{ $event_detail->access }}
                            </p>
                            @endif
                        </div>

                        <div class="event-description mt-4">
                            <h2>イベント詳細</h2>
                            <p>{{ $event_detail->description }}</p>
                        </div>
                        <div class="mt-4 d-flex gap-3">
                            <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                @csrf
                                <input type="hidden" name="eventId" value="{{ $event_detail->id }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-cart-plus me-2"></i>カートに追加
                                </button>
                                <a href="/~se2a_24_lara/public/Event" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>イベント一覧に戻る
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/addtocart.js') }}"></script>
</body>
</html>
