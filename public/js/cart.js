document.addEventListener('DOMContentLoaded', function () {
    const timeSelectorContainer = document.querySelector('.time-selector-container');
    const cartEventsDiv = document.getElementById('cartEvents');
    const cartArray = Object.values(window.cart || {}); // 將物件轉為陣列
    const priority = [];

    if (cartArray.length === 0) {
        cartEventsDiv.innerHTML = `
            <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                <p style="color: black; text-align: center; font-size: 2rem;">カートにイベントが追加されていません。</p>
            </div>`;
        timeSelectorContainer.style.display = 'none';
    } else {
        timeSelectorContainer.style.display = 'block';

        const points = [];
        points.push({ label: '出発場所' });
        cartArray.forEach((item, index) => {
            points.push({ label: item.name });
        });
        points.push({ label: '帰る場所' });

        createTimeline(points);

        console.log('Cart items:', cartArray);
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
        if (startStation) {
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

function updateEventOrder(selectedIndex, selectedValue) {
    const newOrder = parseInt(selectedValue) - 1;
    const selects = document.querySelectorAll('.form-select1');
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');

    // 現在の選択された項目を一時的に保存
    const selectedItem = cart[selectedIndex];

    // 他のアイテムの順番を調整
    cart.forEach((item, index) => {
        if (index === selectedIndex) return;
        const currentOrder = parseInt(selects[index].value) - 1;

        if (newOrder <= currentOrder) {
            selects[index].value = (currentOrder + 1).toString();
        }
    });

    // カートから選択された項目を削除
    cart.splice(selectedIndex, 1);
    // 新しい位置に項目を挿入
    cart.splice(newOrder, 0, selectedItem);

    // カートを保存
    localStorage.setItem('cart', JSON.stringify(cart));

    // ページをリロードして新しい順序を反映
    location.reload();
}

window.addEventListener('DOMContentLoaded', () => {
    const selects = document.querySelectorAll('.form-select1');
    selects.forEach(select => {
        select.setAttribute('data-prev-value', select.value);
    });

});



function createTimeline(points) {
    const timeline = document.getElementById('timeline');
    timeline.innerHTML = '';

    points.forEach((point, index) => {
        const pointDiv = document.createElement('div');
        pointDiv.classList.add('point');
        const position = (100 / (points.length - 1)) * index;
        pointDiv.style.left = `${position}%`;
        pointDiv.setAttribute('data-label', point.label);
        timeline.appendChild(pointDiv);

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
    let options = '';
    for (let i = 1; i <= total; i++) {
        options += `<option value="${i}" ${i === current + 1 ? 'selected' : ''}>${i}番目</option>`;
    }
    return options;
}
