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
        if(lunchTime.checked){
            lunchTimeInfo = '一時間ランチタイムを追加して'
        };
        let dinnerTimeInfo = '';
        if(dinnerTime.checked){
            dinnerTimeInfo = '一時間ディナータイムを追加して'
        };
        /////////////////////////////////////////////////////
        let startStationInfo = '';
        if(startStation){
            startStationInfo = startStation;
        }

        let reachStationInfo = '';
        if(startStation){
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

    // function generateOrderOptions(total, current) {
    //         return Array.from({ length: total }, (_, i) => {
    //             return `<option value="${i + 1}" ${i === current ? 'selected' : ''}>${i + 1}番目</option>`;
    //         }).join('');
    //     }

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

