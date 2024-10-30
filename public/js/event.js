let debounceTimer;

function refreshEvents() {
    const loading = document.getElementById('loading');
    const eventList = document.getElementById('event-list');
    const noResults = document.getElementById('no-results');
    const keyword = document.querySelector('#keyword')?.value || '';
    const area = document.querySelector('#area')?.value || '';
    const category = document.querySelector('#category')?.value || '';

    loading.classList.remove('d-none');
    eventList.innerHTML = '';
    noResults.classList.add('d-none');

    const params = new URLSearchParams({
        keyword: keyword,
        area: area,
        category: category
    });

    fetch(`/api/events?${params.toString()}`)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.error) throw new Error(data.error);

            if (data.length === 0) {
                noResults.classList.remove('d-none');
                return;
            }

            data.forEach(event => {
                const card = createEventCard(event);
                eventList.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error:', error);
            eventList.innerHTML = `
                <div class="col-12 text-center text-danger">
                    <p>イベント情報の取得に失敗しました。</p>
                </div>
            `;
        })
        .finally(() => {
            loading.classList.add('d-none');
        });
}

function createEventCard(event) {
    const col = document.createElement('div');
    col.className = 'col-md-4 mb-4';

    col.innerHTML = `
        <div class="card h-100 shadow-sm">
            <img src="${event.image_url || '/images/events/default_event.jpg'}"
                 class="card-img-top" alt="${event.title}"
                 style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">${event.title}</h5>
                <p class="card-text">
                    <small class="text-muted">
                        <i class="bi bi-calendar"></i>
                        ${new Date(event.start_date).toLocaleDateString('ja-JP')}
                        ${event.start_date !== event.end_date ?
                            `～ ${new Date(event.end_date).toLocaleDateString('ja-JP')}` :
                            ''}
                    </small>
                </p>
                <p class="card-text">
                    <i class="bi bi-geo-alt"></i> ${event.location}
                </p>
                <p class="card-text description">${event.description}</p>
            </div>
            <div class="card-footer bg-transparent">
                <a href="/Event/${event.id}" class="btn btn-outline-primary w-100">詳細を見る</a>
            </div>
        </div>
    `;

    return col;
}

function debounceSearch(func, delay) {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(func, delay);
}

document.addEventListener('DOMContentLoaded', () => {
    const keyword = document.querySelector('#keyword');
    const area = document.querySelector('#area');
    const category = document.querySelector('#category');

    if (keyword) {
        keyword.addEventListener('input', () => {
            debounceSearch(refreshEvents, 300);
        });
    }

    if (area) {
        area.addEventListener('change', refreshEvents);
    }

    if (category) {
        category.addEventListener('change', refreshEvents);
    }

    refreshEvents();
});

setInterval(refreshEvents, 300000);
