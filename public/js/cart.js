document.addEventListener('DOMContentLoaded', function () {
    const timeSelectorContainer = document.querySelector('.time-selector-container');
    const cartEventsDiv = document.getElementById('cartEvents');
    const cartArray = Object.values(window.cart || {}); // PHPから渡されたカートデータを使用

    if (cartArray.length === 0) {
        cartEventsDiv.innerHTML = `
            <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                <p style="color: black; text-align: center; font-size: 2rem;">カートにイベントが追加されていません。</p>
            </div>`;
        timeSelectorContainer.style.display = 'none';
    } else {
        timeSelectorContainer.style.display = 'block';

        // 初期タイムラインの作成
        updateTimelineFromCart(cartArray);

        // 順番選択の初期化
        initializeOrderSelects();
    }

    const createPlanButton = document.getElementById('createPlanButton');

    createPlanButton.onclick = function () {
        const startDate = document.getElementById('startDate')?.value || '';
        const startTime = document.getElementById('startTime')?.value || '';
        const endTime = document.getElementById('endTime')?.value || '';
        const departurePlace = document.getElementById('departurePlace')?.value || '';
        const destination = document.getElementById('destination')?.value || '';
        const lunchTime = document.getElementById('lunchTime');
        const dinnerTime = document.getElementById('dinnerTime');
        const startStation = document.getElementById('startStation')?.value || '';
        const reachStation = document.getElementById('reachStation')?.value || '';

        const priority = [];
        cartArray.forEach((item, index) => {
            const { priorityValue, durationValue } = getSelectValues(item.id); // 使用 item.id
            priority.push({
                title: item.name,
                priority: priorityValue,
                duration: durationValue,
                details: item.details || {},
            });
        });

        const errorMessage = Object.entries({
            startDate: '訪問日',
            startTime: '開始時間',
            endTime: '終了時間',
            departurePlace: '出発地',
            destination: '到着地',
        })
            .filter(([fieldId]) => !document.getElementById(fieldId)?.value)
            .map(([, fieldName]) => fieldName);

        if (errorMessage.length > 0) {
            alert(`${errorMessage.join('、')}を選択してください。`);
            return;
        }
        ///////////////////////////////////////////////////
        let lunchTimeInfo = '';
        if (lunchTime.checked) {
            lunchTimeInfo = '一時間ランチタイムを追加して'
        };
        let dinnerTimeInfo = '';
        if (dinnerTime.checked) {
            dinnerTimeInfo = '一時間ディナータイムを追加して'
        };
        /////////////////////////////////////////////////////
        let startStationInfo = '';
        if (startStation) {
            startStationInfo = startStation;
        }

        let reachStationInfo = '';
        if (reachStation) {
            reachStationInfo = reachStation;
        }
        /////////////////////////////////////////////////////

        const question = `
        以下の場所を訪れるプランを作成してください：
        ${priority.map(place => `${place.title}（優先度: ${place.priority}, 滞在時間: ${place.duration}分）`).join('、')}

        以下の条件でご案内してください：
        - 訪問日: ${startDate}
        - 開始時間: ${startTime}時
        - 終了時間: ${endTime}時
        - 出発地: ${departurePlace},${startStationInfo}
        - 到着地: ${destination},${reachStationInfo}
        - ${lunchTimeInfo}
        - ${dinnerTimeInfo}
        - 乗換案内、営業時間、アクセス、料金を確認してください。
        - 日本語で具体的な時間のスケジュールを作成してください。
        - アドバイスをください。
        `.trim();

        sessionStorage.setItem('question', JSON.stringify(question));
        window.location.href = "/~se2a_24_lara/public/Result";
    };
});

function getSelectValues(id) {
    const priorityId = `placePriority${id}`;
    const durationId = `durationSelect${id}`;

    const priorityElement = document.getElementById(priorityId);
    const durationElement = document.getElementById(durationId);

    if (!priorityElement || !durationElement) {
        console.error(`元素未找到: ${priorityId} 或 ${durationId}`);
        return { priorityValue: '1', durationValue: '60' };
    }

    const priorityValue = priorityElement.value || '1';
    const durationValue = durationElement.value || '60';
    return { priorityValue, durationValue };
}

function updateTimelineFromCart(cartArray) {
    const points = [];
    points.push({ label: '出発場所' });

    // カートの順番通りにポイントを追加
    cartArray.forEach(item => {
        points.push({ label: item.name });
    });

    points.push({ label: '帰る場所' });

    // タイムラインを再作成
    createTimeline(points);
}

function updateEventOrder(selectedIndex, selectedValue) {
    const newOrder = parseInt(selectedValue) - 1;
    const cart = Object.values(window.cart || {});

    // 並び替えの処理を関数に分離
    reorderCart(selectedIndex, newOrder);
    updateCartUI(selectedIndex, newOrder);
    updateOrderSelects();
    updateTimelineFromCart(window.cart);
}

// カートデータの並び替え
function reorderCart(fromIndex, toIndex) {
    const cart = Object.values(window.cart);
    const [movedItem] = cart.splice(fromIndex, 1);
    cart.splice(toIndex, 0, movedItem);
    window.cart = cart;
}

// カートUIの更新
function updateCartUI(fromIndex, toIndex) {
    const cartAccordion = document.getElementById('cartAccordion');
    if (!cartAccordion) return;

    const items = Array.from(cartAccordion.children);
    if (!items[fromIndex] || !items[toIndex]) return;

    const movedElement = items[fromIndex].cloneNode(true); // 要素をクローン

    // 新しい要素にイベントリスナーを再設定
    const selects = movedElement.querySelectorAll('select');
    selects.forEach(select => {
        if (select.id.startsWith('placePriority')) {
            const itemId = select.id.replace('placePriority', '');
            select.onchange = function(e) {
                updateEventOrder(toIndex, e.target.value);
                getSelectValues(itemId);
            };
        }
    });

    // DOMの更新
    if (toIndex < fromIndex) {
        // 上に移動
        items[toIndex].parentNode.insertBefore(movedElement, items[toIndex]);
    } else {
        // 下に移動
        if (items[toIndex + 1]) {
            items[toIndex + 1].parentNode.insertBefore(movedElement, items[toIndex + 1]);
        } else {
            items[toIndex].parentNode.appendChild(movedElement);
        }
    }

    // 古い要素を削除
    items[fromIndex].remove();
}

// セレクトボックスの更新
function updateOrderSelects() {
    const cart = Object.values(window.cart);
    const orderSelects = document.querySelectorAll('[id^="placePriority"]');

    orderSelects.forEach((select, index) => {
        const itemId = select.id.replace('placePriority', '');
        select.innerHTML = generateOrderOptions(cart.length, index);
        select.value = index + 1;

        // イベントリスナーを再設定
        select.onchange = function(e) {
            updateEventOrder(index, e.target.value);
            getSelectValues(itemId);
        };
    });
}

function initializeOrderSelects() {
    const cart = Object.values(window.cart || {});
    const orderSelects = document.querySelectorAll('[id^="placePriority"]');

    orderSelects.forEach((select, index) => {
        const itemId = select.id.replace('placePriority', '');
        select.innerHTML = generateOrderOptions(cart.length, index);
        select.value = index + 1;

        // 初期のイベントリスナーを設定
        select.onchange = function(e) {
            updateEventOrder(index, e.target.value);
            getSelectValues(itemId);
        };
    });
}

function createTimeline(points) {
    const timeline = document.getElementById('timeline');
    timeline.innerHTML = '';

    points.forEach((point, index) => {
        // ポイントの作成
        const pointDiv = document.createElement('div');
        pointDiv.classList.add('point');
        const position = (100 / (points.length - 1)) * index;
        pointDiv.style.left = `${position}%`;
        pointDiv.setAttribute('data-label', point.label);

        // 最初と最後のポイントに特別なスタイルを適用
        if (index === 0 || index === points.length - 1) {
            pointDiv.classList.add('endpoint');
        }

        timeline.appendChild(pointDiv);

        // ラインの作成（最後のポイント以外）
        if (index < points.length - 1) {
            const lineDiv = document.createElement('div');
            lineDiv.classList.add('line');
            lineDiv.style.left = `${position}%`;
            lineDiv.style.width = `${100 / (points.length - 1)}%`;
            timeline.appendChild(lineDiv);
        }
    });
}

function generateOrderOptions(total, current) {
    return Array.from({ length: total }, (_, i) => {
        const value = i + 1;
        return `<option value="${value}" ${value === current + 1 ? 'selected' : ''}>${value}番目</option>`;
    }).join('');
}

window.addEventListener('DOMContentLoaded', () => {
    const selects = document.querySelectorAll('.form-select1');
    selects.forEach(select => {
        select.setAttribute('data-prev-value', select.value);
    });

});
