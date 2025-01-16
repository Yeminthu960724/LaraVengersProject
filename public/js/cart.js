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

    const createPlanButton = document.getElementById('createPlanButton');

    createPlanButton.onclick = function () {
        const startDate = document.getElementById('startDate')?.value || '';
        const startTime = document.getElementById('startTime')?.value || '';
        const endTime = document.getElementById('endTime')?.value || '';
        const departurePlace = document.getElementById('departurePlace')?.value || '';
        const destination = document.getElementById('destination')?.value || '';
        const priority = [];

        const cart = window.cart || [];

        const cartArray = Object.values(cart);

        // let cart = JSON.parse(localStorage.getItem('cart') || '[]');

        cartArray.forEach((item, index) => {
            // Dynamically construct the ID
            const priorityId = `placePriorityplace_${index}`;
            const durationId = `durationSelect${index}`;

            // Get values from the select elements
            const priorityValue = document.getElementById(priorityId)?.value || '1';
            const durationValue = document.getElementById(durationId)?.value || '60';

            // Push the data to the priority array
            priority.push({
                title: item.name,
                priority: priorityValue,
                duration: durationValue,
                details: item.details || {},
            });
        });



        const placesList = priority.map(place => {
            return `${place.title}（優先度: ${place.priority}, 滞在時間: ${place.duration}分）`;
        }).join('、');

    /////////////////////セット///////////////////////
        const fields = {
            startDate: '訪問日',
            startTime: '開始時間',
            endTime: '終了時間',
            departurePlace: '出発地',
            destination: '到着地'
        };

        const errorMessage = [];
        for (const [fieldId, fieldName] of Object.entries(fields)) {
            const fieldValue = document.getElementById(fieldId)?.value || '';
            if (!fieldValue) {
                errorMessage.push(fieldName);
            }
        }

        if (errorMessage.length > 0) {
            alert(errorMessage.join('、') + "を選択してください。");
            return;
        }
    ///////////////////////////////////////////////////

        const question = `
    以下の場所を訪れるプランを作成してください：
    ${placesList}

    条件：
    - 訪問日: ${startDate}
    - 開始時間: ${startTime}時
    - 終了時間: ${endTime}時
    - 出発地: ${departurePlace}
    - 到着地: ${destination}

    以下の情報も考慮してプランを作成してください：
    ${priority.map(place => `
    - ${place.title}
      - 営業時間: ${place.details?.openingHours || '情報なし'}
      - アクセス: ${place.details?.access || '情報なし'}
    `).join('\n')}

    日本語で具体的な時間のスケジュールを作成してください。
    `;


    sessionStorage.setItem('question', JSON.stringify(question));



    window.location.href = "/~se2a_24_lara/public/Result";

    }

});

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

