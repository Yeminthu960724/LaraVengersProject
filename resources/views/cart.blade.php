<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>

<body>
    <!-- Header Section -->
    <header id="header"></header>

    <!-- Navigation Bar -->
    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <!-- Main Content Section -->
    <main>

        <!-- イベント情報を表示するセクション -->
        <div class="mb-4">
            <h2 class="h4 mb-3">追加したイベント</h2>
            <div id="cartEvents" class="accordion mb-4">
                <!-- JavaScriptでイベント情報が挿入されます -->
                <div class="container mt-5">
                    <h1 class="mb-4">カートの中身</h1>
                    <div class="accordion" id="cartAccordion">
                        @forelse ($cart as $index => $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#item-{{ $index }}" aria-expanded="true" aria-controls="item-{{ $index }}">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item['image_url']}}"
                                                 alt="{{ $item['name'] }}"
                                                 class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                            <div>
                                                <h5 class="mb-0">{{ $item['name'] }}</h5>
                                                <small class="text-muted">
                                                    <i class="bi bi-geo-alt"></i> {{ $item['location'] ?? '不明な場所' }}
                                                    <span class="badge bg-success ms-2">観光施設</span>
                                                </small>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="item-{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="heading-{{ $index }}">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <h6>基本情報</h6>
                                                <p class="mb-2">{{ $item['description'] ?? '説明がありません。' }}</p>
                                                @if (!empty($item['details']))
                                                    <div class="details-info mt-3">
                                                        <p><strong>営業時間:</strong> {{ $item['details']['openingHours'] ?? '不明' }}</p>
                                                        {{-- <p><strong>料金:</strong> {{ $item['details']['price'] ?? '不明' }}</p> --}}
                                                        @if (!empty($item['details']['website']))
                                                            <p><strong>公式サイト:</strong>
                                                                <a href="{{ $item['details']['website'] }}" target="_blank">{{ $item['details']['website'] }}</a>
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">行く順番：</label>
                                                <select class="form-select" onchange="updatePriority({{ $index }}, this.value)">
                                                    @for ($i = 1; $i <= count($cart); $i++)
                                                        <option value="{{ $i }}" {{ $i == $index + 1 ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">滞在時間：</label>
                                                <select class="form-select" onchange="updateDuration({{ $index }}, this.value)">
                                                    <option value="30">30分</option>
                                                    <option value="60">1時間</option>
                                                    <option value="90">1時間30分</option>
                                                    <option value="120">2時間</option>
                                                    <option value="150">2時間30分</option>
                                                    <option value="180">3時間</option>
                                                    <option value="210">3時間30分</option>
                                                    <option value="240">4時間</option>
                                                    <option value="">他（自分で入力）</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">カートは空です</p>
                        @endforelse
                    </div>
                    <div class="text-end mt-4">
                        <a href="/" class="btn btn-primary">戻る</a>
                    </div>
                </div>


            <div class="text-center mt-4">
                <button id="makePlanButton" class="btn btn-primary btn-lg">
                    <i class="bi bi-calendar-check"></i> プランを生成する
                </button>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>

</body>

</html>
