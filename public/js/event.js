document.addEventListener('DOMContentLoaded', function() {
    const eventCards = document.querySelectorAll('.col');

    function filterEvents() {
        const keyword = document.getElementById('keyword').value.toLowerCase();
        const area = document.getElementById('area').value.toLowerCase();
        const category = document.getElementById('category').value;

        eventCards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            const description = card.querySelector('.card-text').textContent.toLowerCase();
            const location = card.querySelector('.bi-geo-alt').nextSibling.textContent.toLowerCase();
            const eventCategory = card.querySelector('.badge').textContent;

            const matchesKeyword = title.includes(keyword) || description.includes(keyword);
            const matchesArea = !area || location.includes(area);
            const matchesCategory = !category || eventCategory === category;

            if (matchesKeyword && matchesArea && matchesCategory) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // カートに追加する関数を追加
    window.addToCart = function(event) {
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');

        // イベントタイプを追加
        event.type = 'event';

        // 重複チェック
        const isDuplicate = cart.some(item => item.id === event.id);
        if (isDuplicate) {
            alert('このイベントは既にカートに追加されています。');
            return;
        }

        cart.push(event);
        localStorage.setItem('cart', JSON.stringify(cart));

        // カート数を更新
        updateCartCount();

        // モーダルを表示
        const modal = new bootstrap.Modal(document.getElementById('cartModal'));
        modal.show();
    }

    // イベントリスナーの設定
    document.getElementById('keyword').addEventListener('input', filterEvents);
    document.getElementById('area').addEventListener('change', filterEvents);
    document.getElementById('category').addEventListener('change', filterEvents);
});
