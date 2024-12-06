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

    // const alertMessage = document.getElementById('alert-message');
    // if (alertMessage) {
    //     setTimeout(() => {
    //         alertMessage.style.transition = "opacity 0.5s ease";
    //         alertMessage.style.opacity = "0";
    //         setTimeout(() => alertMessage.remove(), 500); // Completely remove the element after fade-out
    //     }, 1000); // 1 seconds delay
    // }
});


// document.getElementById('filterButton').addEventListener('click', () => {
//     // Get selected location and characteristics
//     const selectedLocations = Array.from(document.querySelectorAll('input[name="location"]:checked'))
//         .map(checkbox => checkbox.value);
//     const selectedCharacteristics = Array.from(document.querySelectorAll('input[name="characteristics"]:checked'))
//         .map(checkbox => checkbox.value);

//     // Filter places
//     document.querySelectorAll('#posts .col').forEach(card => {
//         const location = card.dataset.location;
//         const characteristics = card.dataset.characteristics.split(',');

//         // Check if the place matches selected filters
//         const matchesLocation = selectedLocations.length === 0 || selectedLocations.includes(location);
//         const matchesCharacteristic = selectedCharacteristics.length === 0 ||
//             selectedCharacteristics.some(selected => characteristics.includes(selected));

//         // Toggle visibility based on filter match
//         if (matchesLocation && matchesCharacteristic) {
//             card.style.display = 'block';
//         } else {
//             card.style.display = 'none';
//         }
//     });
// });



// function addToCart(place) {
//     let cart = JSON.parse(localStorage.getItem('cart') || '[]');
//     cart.push(place);
//     localStorage.setItem('cart', JSON.stringify(cart));
//     updateCartCount();
//     alert('カートに追加しました');
// }

// function updateCartCount() {
//     const cart = JSON.parse(localStorage.getItem('cart') || '[]');
//     const cartCount = document.querySelector('.cart-count');
//     if (cartCount) {
//         cartCount.textContent = cart.length;
//     }
// }

// function toggleFilter() {
//     const filterContent = document.getElementById('filterContent');
//     const filterIcon = document.getElementById('filterIcon');

//     filterContent.classList.toggle('collapsed');
//     filterIcon.classList.toggle('rotated');
// }

// function toggleSection(sectionId) {
//     const content = document.getElementById(sectionId);
//     const header = content.previousElementSibling;

//     // トグル
//     content.classList.toggle('show');
//     header.classList.toggle('active');

//     // アニメーション用の高さ設定
//     if (content.classList.contains('show')) {
//         content.style.maxHeight = content.scrollHeight + "px";
//     } else {
//         content.style.maxHeight = "0";
//     }
// }

// 初期状態で開いておく場合は以下をコメントアウト
/*
document.addEventListener('DOMContentLoaded', () => {
    const sections = ['category-section', 'area-section'];
    sections.forEach(sectionId => {
        const content = document.getElementById(sectionId);
        const header = content.previousElementSibling;

        content.classList.add('show');
        header.classList.add('active');
        content.style.maxHeight = content.scrollHeight + "px";
    });
});
*/
