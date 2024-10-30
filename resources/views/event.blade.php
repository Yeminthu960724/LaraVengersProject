<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関西のイベント情報</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
</head>
<body>
    <header id="header"></header>

    <main class="container py-4">
        <h1 class="mb-4">関西のイベント情報</h1>

        <div class="search-section mb-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" id="keyword" class="form-control" placeholder="キーワードで検索">
                        <select id="area" class="form-select">
                            <option value="">エリアを選択</option>
                            <option value="osaka">大阪</option>
                            <option value="kyoto">京都</option>
                            <option value="kobe">神戸</option>
                            <option value="nara">奈良</option>
                        </select>
                        <select id="category" class="form-select">
                            <option value="">カテゴリーを選択</option>
                            <option value="祭り">祭り</option>
                            <option value="伝統行事">伝統行事</option>
                            <option value="花火大会">花火大会</option>
                            <option value="グルメ">グルメフェス</option>
                            <option value="音楽">音楽フェス</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div id="loading" class="text-center mb-4 d-none">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div id="event-list" class="row g-4">
            <!-- イベントが動的に挿入されます -->
        </div>

        <div id="no-results" class="text-center py-5 d-none">
            <p class="text-muted">該当するイベントが見つかりませんでした。</p>
        </div>
    </main>

    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>
