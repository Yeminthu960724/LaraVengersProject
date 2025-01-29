document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form);
            const actionUrl = form.getAttribute('action');

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // 成功通知を表示
                    showNotification('カートに追加しました！');
                    // alert('カートに追加しました');

                    // Update cart count if included in the response
                    if (data.cartCount !== undefined) {
                        document.querySelector('.cart-count').textContent = data.cartCount;
                    }
                } else {
                    alert('カートに追加できませんでした: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('エラーが発生しました。');
            });
        });
    });

});


// 通知を表示する関数
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;

    // スタイルを設定
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        color: #333;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        animation: slideIn 0.3s ease-out;
    `;

    document.body.appendChild(notification);

    // 3秒後に通知を消す
    setTimeout(() => {
        notification.style.animation = 'fadeOut 0.3s ease-out forwards';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}