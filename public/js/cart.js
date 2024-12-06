document.addEventListener('DOMContentLoaded', function () {
    const timeSelectorContainer = document.querySelector('.time-selector-container');
    const cartEventsDiv = document.getElementById('cartEvents');

    // Use the globally defined window.cart variable
    const cart = window.cart || [];

    if (cart.length === 0) {
        // No items in the cart
        cartEventsDiv.innerHTML = `
            <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                <p style="color: black; text-align: center; font-size: 2rem;">カートにイベントが追加されていません。</p>
            </div>`;
        timeSelectorContainer.style.display = 'none';
    } else {
        // Cart has items
        timeSelectorContainer.style.display = 'block';
        console.log('Cart items:', cart);
    }
});


// // DOM要素の取得
// const cartEventsDiv = document.getElementById('cartEvents');
// const makePlanButton = document.getElementById('makePlanButton');

// // カートの初期化と表示
// function initializeCart() {
//     const cart = getCart();
//     if (cart.length === 0) {
//         showEmptyCartMessage();
//         return;
//     }
//     displayCartItems(cart);
// }

// // カートアイテムの表示
// function displayCartItems(cart) {
//     cartEventsDiv.innerHTML = ''; // 既存のコンテンツをクリア
//     cart.forEach((item, index) => {
//         const eventHtml = createCartItemHTML(item, index, cart.length);
//         cartEventsDiv.insertAdjacentHTML('beforeend', eventHtml);
//     });
// }

// // カートアイテムのHTML生成
// function createCartItemHTML(item, index, totalItems) {
//     const isEvent = item.type === 'event';
//     return `
//         <div class="accordion-item">
//             <h2 class="accordion-header">
//                 <button class="accordion-button" type="button" data-bs-toggle="collapse"
//                         data-bs-target="#item-${index}" aria-expanded="true">
//                     <div class="d-flex align-items-center w-100">
//                         <img src="${item.image_url}" alt="${item.title}"
//                              class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
//                         <div class="flex-grow-1">
//                             <h5 class="mb-0">${item.title}</h5>
//                             <small>
//                                 <i class="bi bi-geo-alt"></i> ${item.location}
//                                 <span class="badge ${isEvent ? 'bg-info' : 'bg-success'} ms-2">
//                                     ${isEvent ? 'イベント' : '観光施設'}
//                                 </span>
//                             </small>
//                         </div>
//                     </div>
//                 </button>
//             </h2>
//             <div id="item-${index}" class="accordion-collapse collapse show">
//                 <div class="accordion-body">
//                     <div class="row">
//                         <div class="col-12 mb-3">
//                             <p class="mb-2">${item.description}</p>
//                         </div>
//                         <div class="col-md-6 mb-3">
//                             <label class="form-label">行く順番：</label>
//                             <select class="form-select" onchange="updateEventOrder(${index}, this.value)">
//                                 ${generateOrderOptions(totalItems, index)}
//                             </select>
//                         </div>
//                         <div class="col-md-6 mb-3">
//                             <label class="form-label">滞在時間：</label>
//                             <select class="form-select" onchange="updateEventDuration(${index}, this.value)">
//                                 ${generateDurationOptions()}
//                             </select>
//                         </div>
//                     </div>
//                     <div class="text-end">
//                         <button onclick="removeFromCart(${index})" class="btn btn-outline-danger btn-sm">
//                             <i class="bi bi-trash"></i> 削除
//                         </button>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     `;
// }

// // ユーティリティ関数
// function getCart() {
//     return JSON.parse(localStorage.getItem('cart') || '[]');
// }

// function showEmptyCartMessage() {
//     cartEventsDiv.innerHTML = '<p class="text-white">カートにイベントが追加されていません。</p>';
// }

// function generateOrderOptions(total, current) {
//     return Array.from({ length: total }, (_, i) => {
//         return `<option value="${i + 1}" ${i === current ? 'selected' : ''}>${i + 1}番目</option>`;
//     }).join('');
// }

// function generateDurationOptions() {
//     const durations = [
//         { value: 30, text: '30分' },
//         { value: 60, text: '1時間' },
//         { value: 90, text: '1時間30分' },
//         { value: 120, text: '2時間' },
//         { value: 150, text: '2時間30分' },
//         { value: 180, text: '3時間' },
//         { value: 210, text: '3時間30分' },
//         { value: 240, text: '4時間' }
//     ];
//     return durations.map(duration =>
//         `<option value="${duration.value}">${duration.text}</option>`
//     ).join('');
// }

// // イベントハンドラ
// function updateEventOrder(index, order) {
//     const cart = getCart();
//     cart[index].order = parseInt(order);
//     localStorage.setItem('cart', JSON.stringify(cart));
// }

// function updateEventDuration(index, duration) {
//     const cart = getCart();
//     cart[index].duration = parseInt(duration);
//     localStorage.setItem('cart', JSON.stringify(cart));
// }

// function removeFromCart(index) {
//     const cart = getCart();
//     cart.splice(index, 1);
//     localStorage.setItem('cart', JSON.stringify(cart));
//     initializeCart(); // ページをリロードする代わりに再描画
// }

// // プラン生成ボタンのイベントハンドラ
// makePlanButton.onclick = function() {
//     const cart = getCart();
//     if (cart.length === 0) {
//         alert('プランを生成するにはイベントを追加してください。');
//         return;
//     }
//     alert('プラン生成機能は準備中です。');
// };

// // 初期化
// document.addEventListener('DOMContentLoaded', initializeCart);
