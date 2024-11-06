<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>

<body>
    <header id="header"></header>

    <div class="container py-4">
        <h1 class="mb-4">カート</h1>

        <!-- イベント情報を表示するセクション -->
        <div class="mb-4">
            <h2 class="h4 mb-3">追加したイベント</h2>
            <div id="cartEvents" class="accordion mb-4">
                <!-- JavaScriptでイベント情報が挿入されます -->
            </div>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary btn-lg" onclick="generatePlan()">
                <i class="bi bi-calendar-check"></i> プランを生成する
            </button>
        </div>
    </div>

    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const cartEventsDiv = document.getElementById('cartEvents');

            if (cart.length === 0) {
                cartEventsDiv.innerHTML = '<p class="text-muted">カートにイベントが追加されていません。</p>';
                return;
            }

            cart.forEach((item, index) => {
                const isEvent = item.type === 'event';
                const eventHtml = `
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item-${index}" aria-expanded="true">
                                <div class="d-flex align-items-center">
                                    <img src="${item.image_url}" alt="${item.title}"
                                         class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <h5 class="mb-0">${item.title}</h5>
                                        <small class="text-muted">
                                            <i class="bi bi-geo-alt"></i> ${item.location}
                                            <span class="badge ${isEvent ? 'bg-info' : 'bg-success'} ms-2">
                                                ${isEvent ? 'イベント' : '観光施設'}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="item-${index}" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h6>基本情報</h6>
                                        <p class="mb-2">${item.description}</p>
                                        ${item.details ? `
                                            <div class="details-info mt-3">
                                                ${isEvent ? `
                                                    <p><strong>開催期間:</strong> ${item.details.start_date} ～ ${item.details.end_date}</p>
                                                    <p><strong>状態:</strong> ${item.details.status}</p>
                                                ` : `
                                                    <p><strong>営業時間:</strong> ${item.details.openingHours}</p>
                                                    <p><strong>料金:</strong> ${item.details.price}</p>
                                                    <p><strong>アクセス:</strong> ${item.details.access}</p>
                                                    ${item.details.website ? `
                                                        <p><strong>公式サイト:</strong>
                                                            <a href="${item.details.website}" target="_blank">${item.details.website}</a>
                                                        </p>
                                                    ` : ''}
                                                `}
                                            </div>
                                        ` : ''}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">行く順番：</label>
                                        <select class="form-select" onchange="updateEventOrder(${index}, this.value)">
                                            ${generateOrderOptions(cart.length, index)}
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">滞在時間：</label>
                                        <select class="form-select" onchange="updateEventDuration(${index}, this.value)">
                                            <option value="1">1時間</option>
                                            <option value="2">2時間</option>
                                            <option value="3">3時間</option>
                                            <option value="4">4時間</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button onclick="removeFromCart(${index})" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> 削除
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                cartEventsDiv.insertAdjacentHTML('beforeend', eventHtml);
            });
        });

        function generateOrderOptions(total, current) {
            let options = '';
            for (let i = 1; i <= total; i++) {
                options += `<option value="${i}" ${i === current + 1 ? 'selected' : ''}>${i}番目</option>`;
            }
            return options;
        }

        function updateEventOrder(index, order) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart[index].order = parseInt(order);
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function updateEventDuration(index, duration) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart[index].duration = parseInt(duration);
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            location.reload();
        }

        function generatePlan() {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            if (cart.length === 0) {
                alert('プランを生成するにはイベントを追加してください。');
                return;
            }
            // ここに後でAPI連携のコードを追加
            alert('プラン生成機能は準備中です。');
        }
    </script>
</body>

</html>
