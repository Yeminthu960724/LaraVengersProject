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
                    alert('カートに追加しました');

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
