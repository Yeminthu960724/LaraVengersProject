document.addEventListener('DOMContentLoaded', function() {
    // イベントデータを取得する関数
    async function fetchEvents() {
        try {
            const response = await fetch('/api/events');
            const events = await response.json();
            return events;
        } catch (error) {
            console.error('イベントの取得に失敗しました:', error);
            return [];
        }
    }

    // イベントを表示する関数
    async function refreshEvents() {
        const eventList = document.getElementById('event-list');
        const keyword = document.getElementById('keyword').value.toLowerCase();
        const area = document.getElementById('area').value;
        const category = document.getElementById('category').value;

        // ローディング表示
        document.getElementById('loading').classList.remove('d-none');

        const events = await fetchEvents();

        const filteredEvents = events.filter(event => {
            const matchesKeyword = event.title.toLowerCase().includes(keyword) ||
                                 event.description.toLowerCase().includes(keyword);
            const matchesArea = !area || event.location.toLowerCase().includes(area.toLowerCase());
            const matchesCategory = !category || event.category === category;

            return matchesKeyword && matchesArea && matchesCategory;
        });

        // ローディング非表示
        document.getElementById('loading').classList.add('d-none');

        eventList.innerHTML = '';
        if (filteredEvents.length === 0) {
            document.getElementById('no-results').classList.remove('d-none');
        } else {
            document.getElementById('no-results').classList.add('d-none');
            filteredEvents.forEach(event => {
                eventList.innerHTML += createEventCard(event);
            });
        }
    }

    // 検索フィルターのイベントリスナー
    document.getElementById('keyword').addEventListener('input', () => {
        debounceSearch(refreshEvents, 300);
    });
    document.getElementById('area').addEventListener('change', refreshEvents);
    document.getElementById('category').addEventListener('change', refreshEvents);

    // 初期表示
    refreshEvents();
});

let debounceTimer;
function debounceSearch(func, delay) {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(func, delay);
}

function createEventCard(event) {
    return `
        <div class="col">
            <div class="card h-100">
                <div class="position-relative">
                    <img src="${event.image_url}" class="card-img-top" alt="${event.title}"
                         style="height: 200px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge" style="background-color: #1B4B8F;">
                            ${event.category}
                        </span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">${event.title}</h5>
                    <p class="card-text">${event.description}</p>
                    <div class="mt-3">
                        <p class="mb-2">
                            <i class="bi bi-calendar me-2"></i>
                            開催期間: ${event.start_date} ～ ${event.end_date}
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-geo-alt me-2"></i>
                            ${event.location}
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-tag me-2"></i>
                            料金: ${event.price === 0 ? '無料' : `${event.price}円`}
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-train-front me-2"></i>
                            ${event.access}
                        </p>
                    </div>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="/Event/${event.id}" class="btn btn-outline-primary flex-grow-1">
                            <i class="bi bi-info-circle me-1"></i> 詳細を見る
                        </a>
                        <button onclick="addToCart(${JSON.stringify(event)})"
                                class="btn btn-primary flex-grow-1">
                            <i class="bi bi-cart-plus me-1"></i> カートに追加
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
}
