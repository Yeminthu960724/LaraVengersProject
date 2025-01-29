@include('layouts.common')
<?php
$place = ['大阪', '京都', '奈良', '神戸', '和歌山', '滋賀', '兵庫'];
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        {{-- @if(session('cartCount'))
            <script>
                document.querySelector('.cart-count').textContent = {{ session('cartCount') }};
            </script>
        @endif --}}

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
                                            <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}"
                                                 class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                            <div>
                                                <h5 class="mb-0">{{ $item['name'] }}</h5>
                                                <small class="text-muted">
                                                    <i class="bi bi-geo-alt"></i> {{ $item['location'] ?? '不明な場所' }}
                                                    <span class="badge bg-success ms-2">
                                                        {{ $item['type'] === 'place' ? '観光施設' : 'イベント' }}
                                                    </span>
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
                                                        <p><strong>営業時間:</strong> {{ $item['details']['openingHours'] ?? '公式サイトで確認してください。' }}</p>
                                                        @if ($item['type'] === 'event')
                                                            <p><strong>料金:</strong> {{ $item['details']['price'] ?? '公式サイトで確認してください。' }}</p>
                                                        @endif
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
                                                <select id="placePriority{{$item['id']}}" class="form-select" onchange="updateEventOrder({{ $index }}, this.value),getSelectValues('{{ $item['id'] }}')">
                                                    {{-- JavaScriptで動的に生成されます --}}
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">滞在時間：</label>
                                                <select id="durationSelect{{$item['id']}}" class="form-select" onchange="getSelectValues('{{ $item['id'] }}')">
                                                    <option value="30">30分</option>
                                                    <option value="60">1時間</option>
                                                    <option value="90">1時間30分</option>
                                                    <option value="120">2時間</option>
                                                    <option value="150">2時間30分</option>
                                                    <option value="180">3時間</option>
                                                    <option value="210">3時間30分</option>
                                                    <option value="240">4時間</option>
                                                    <option value="270">4時間30分</option>
                                                    <option value="300">5時間</option>
                                                    <option value="330">5時間30分</option>
                                                    <option value="360">6時間</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <form action="{{ route('cart.remove', $index) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                    <div class="time-selector-container" style="display: none;">
                        <div class="timeline-section">
                            <h3>旅程の概要</h3>
                            <div id="timeline">
                                <!-- JavaScriptで動的に生成されます -->
                            </div>
                        </div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-calendar-event"></i> 日付(＊必要)
                                </label>
                                <input type="date" id="startDate" class="form-control">
                            </div>
                        </div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-clock"></i> 出発時間(＊必要)
                                </label>
                                <select id="startTime" class="form-select">
                                    <option value="">選択してください</option>
                                    <?php for ($i = 6; $i < 18; $i++): ?>
                                    <option value="<?= htmlspecialchars($i) ?>"><?= htmlspecialchars($i) ?>:00</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-clock-history"></i> 帰る時間(＊必要)
                                </label>
                                <select id="endTime" class="form-select">
                                    <option value="">選択してください</option>
                                    <?php for ($i = 12; $i < 25; $i++): ?>
                                    <option value="<?= htmlspecialchars($i) ?>"><?= htmlspecialchars($i) ?>:00</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-4">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-building-fill-down"></i> 出発場所(＊必要)
                                </label>
                                <select id="departurePlace" class="form-select">
                                    <option value="">選択してください</option>
                                    <?php foreach ($place as $key => $value): ?>
                                    <option value="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <i class="bi bi-building-fill-up"></i> 帰る場所(＊必要)
                                </label>
                                <select id="destination" class="form-select">
                                    <option value="">選択してください</option>
                                    <?php foreach ($place as $key => $value): ?>
                                        <option value="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-4 mb-3">
                                <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">出発駅(ご自由に)</label>
                                        <input type="text" class="form-control" id="startStation" value="">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 mb-6">
                                <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">帰る駅(ご自由に)</label>
                                        <input type="text" class="form-control" id="reachStation" value="">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="lunchTime">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        昼ご飯時間追加
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="dinnerTime">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        夕飯時間追加
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button id="createPlanButton" class="btn btn-generate-plan">
                                <i class="bi bi-calendar-check"></i> プランを生成する
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        window.cart = @json($cart);
    </script>

</body>

</html>
