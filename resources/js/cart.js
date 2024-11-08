const durationSelect = document.getElementById('durationSelect').Value;
const placePriority = document.getElementById('placePriority').Value;
const makePlanButton = document.getElementById('makePlanButton');



makePlanButton.onclick = function(){
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    if (cart.length === 0) {
        alert('プランを生成するにはイベントを追加してください。');
        return;
    }
    // ここに後でAPI連携のコードを追加
    alert('プラン生成機能は準備中です。');
}
