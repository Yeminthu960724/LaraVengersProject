const durationSelect = document.getElementById('durationSelect').value;
const placePriority = document.getElementById('placePriority').value;
const createPlanButton = document.getElementById('createPlanButton');

// createPlanButton.addEventListener('click', function() {
//     let cart = JSON.parse(localStorage.getItem('cart') || '[]');
//     if (cart.length === 0) {
//         alert('プランを生成するにはイベントを追加してください。');
//         return;
//     }
//     // ここに後でAPI連携のコードを追加
//     alert('プラン生成機能は準備中です。');
// });

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
                                <select id="placePriority" class="form-select" onchange="updateEventOrder(${index}, this.value)">
                                    ${generateOrderOptions(cart.length, index)}
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">滞在時間：</label>
                                <select id="durationSelect" class="form-select" onchange="updateEventDuration(${index}, this.value)">
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
