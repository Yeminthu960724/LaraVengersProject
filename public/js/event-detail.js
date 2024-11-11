<script>
        function addToCart(event) {
            // イベントの詳細情報を追加
            event.details = {
                start_date: '{{ $event['start_date'] }}',
                end_date: '{{ $event['end_date'] }}',
                status: '{{ $event['status'] }}',
                location: '{{ $event['location'] }}',
                category: '{{ $event['category'] }}',
                description: '{{ $event['description'] }}',
                access_info: '最寄り駅からのアクセス情報',
                price: '入場料や参加費用の情報',
                organizer: 'イベント主催者情報',
                contact: '連絡先情報',
                website: 'イベントの公式サイトURL'
            };
            event.type = 'event';  // イベントタイプを明示

            // 現在のカートの内容を取得
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');

            // イベントをカートに追加
            cart.push(event);

            // カートを保存
            localStorage.setItem('cart', JSON.stringify(cart));

            // カートの数を更新
            updateCartCount();

            // モーダルを表示
            const modal = new bootstrap.Modal(document.getElementById('cartModal'));
            modal.show();
        }

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = cart.length;
            }
        }

        // ページ読み込み時にカート数を更新
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>

