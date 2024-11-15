document.getElementById('filterButton').addEventListener('click', () => {
    // Get selected areas and characteristics
    const selectedLocations = Array.from(document.querySelectorAll('input[name="location"]:checked'))
        .map(checkbox => checkbox.value);
    const selectedCharacteristics = Array.from(document.querySelectorAll('input[name="characteristics"]:checked'))
        .map(checkbox => checkbox.value);

    // Filter places
    document.querySelectorAll('#posts .col').forEach(card => {
        const location = card.dataset.location;
        const characteristics = card.dataset.characteristics.split(',');

        // Check if the place matches selected filters
        const matchesLocation = selectedLocations.length === 0 || selectedLocations.includes(location);
        const matchesCharacteristic = selectedCharacteristics.length === 0 ||
            selectedCharacteristics.some(selected => characteristics.includes(selected));

        // Toggle visibility based on filter match
        if (matchesLocation && matchesCharacteristic) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});



function addToCart(place) {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    cart.push(place);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    alert('カートに追加しました');
}

function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        cartCount.textContent = cart.length;
    }
}

function toggleFilter() {
    const filterContent = document.getElementById('filterContent');
    const filterIcon = document.getElementById('filterIcon');

    filterContent.classList.toggle('collapsed');
    filterIcon.classList.toggle('rotated');
}

function toggleSection(sectionId) {
    const content = document.getElementById(sectionId);
    const header = content.previousElementSibling;

    // トグル
    content.classList.toggle('show');
    header.classList.toggle('active');

    // アニメーション用の高さ設定
    if (content.classList.contains('show')) {
        content.style.maxHeight = content.scrollHeight + "px";
    } else {
        content.style.maxHeight = "0";
    }
}

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
