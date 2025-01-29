document.title = "関西巡り"


// ヘッダー要素の作成を修正
function createHeader() {
    const header = document.getElementById('header');
    header.innerHTML = `
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/~se2a_24_lara/public/">
                    <i class="bi bi-compass"></i> 関西巡り
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="/~se2a_24_lara/public/Place">
                                <i class="bi bi-map"></i> 観光地
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="/~se2a_24_lara/public/Event">
                                <i class="bi bi-calendar-event"></i> イベント
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu" href="/~se2a_24_lara/public/Plan">
                                <i class="bi bi-journal-text"></i> プラン
                            </a>
                        </li>
                    </ul>

                    <div class="nav-item">
                        <a href="/~se2a_24_lara/public/Cart" class="nav-link cart-button me-2">
                            <i class="bi bi-cart3"></i>
                            <span>カート</span>
                            <span class="cart-count">window.cartCount</span>
                        </a>
                    </div>

                    <div class="nav-item">
                            <a href="/~se2a_24_lara/public/myprofile" class="nav-link profile-button">
                                <i class="bi bi-person-lines-fill"></i>
                                <span>マイページ</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    `;
    // スタイルを追加
    const style = document.createElement('style');
    style.textContent = `
     /* ナビゲーションバーのスタイル */
     .navbar {
         background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
         backdrop-filter: blur(10px);
         box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
         border: none;
         padding: 1rem 0;
         position: fixed;
         width: 100%;
         top: 0;
         z-index: 1000;
     }

     /* 背景との一体感を出すためのオーバーレイ */
     .navbar::before {
         content: '';
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background: inherit;
         backdrop-filter: blur(10px);
         z-index: -1;
     }

     /* ナビゲーションのカードとログインボタンの修正 */
     .nav-link.main-menu {
         color: #ffffff !important;
         font-size: 1.1rem;
         font-weight: 600;
         text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
         background: rgba(255, 255, 255, 0.1);
         border-radius: 8px;
         padding: 8px 20px !important;
         margin: 0 5px;
     }

     .nav-link.main-menu:hover {
         background: rgba(255, 255, 255, 0.2);
         transform: translateY(-2px);
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
     }

     /* カートとログインボタンのスタイルを他のメインメニューと統一 */
     .cart-button, .login-button, .profile-button {
         color: #ffffff !important;
         font-size: 1.1rem;
         font-weight: 600;
         text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
         background: rgba(255, 255, 255, 0.1);
         border-radius: 8px;
         padding: 8px 20px !important;
         margin: 0 5px;
         display: flex;
         align-items: center;
         gap: 8px;
         border: none;
         transition: all 0.3s ease;
     }

     .cart-button:hover, .login-button:hover, .profile-button:hover {
         background: rgba(255, 255, 255, 0.2);
         transform: translateY(-2px);
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
     }

     /* カート数のバッジスタイル */
     .cart-count {
         background: rgba(255, 255, 255, 0.2);
         padding: 2px 6px;
         border-radius: 12px;
         font-size: 0.8rem;
         margin-left: 4px;
     }

     /* アイコンのスタイル統一 */
     .cart-button i, .login-button i, .profile-button i {
         font-size: 1.2rem;
         color: #ffffff;
     }

     /* テキストのスタイル統一 */
     .cart-button span, .login-button span, .profile-button span {
         color: #ffffff !important;
         font-weight: 600;
     }

     /* 検索ボックスのスタイル調整 */
     .search-box {
         position: relative;
     }

     .search-wrapper {
         position: relative;
         width: 200px;  /* 幅を小さく */
     }

     .search-icon {
         position: absolute;
         left: 12px;
         top: 50%;
         transform: translateY(-50%);
         color: rgba(255, 255, 255, 0.7);
         z-index: 1;
         font-size: 0.9rem;  /* アイコンサイズを小さく */
     }

     .search-input {
         width: 100%;
         padding: 8px 15px 8px 35px;  /* パディングを小さく */
         border-radius: 20px;
         background: rgba(255, 255, 255, 0.15);
         border: 1px solid rgba(255, 255, 255, 0.2);
         color: white;
         font-size: 0.9rem;
         backdrop-filter: blur(10px);
         transition: all 0.3s ease;
     }

     .search-input::placeholder {
         color: rgba(255, 255, 255, 0.7);
     }

     .search-input:focus {
         background: rgba(255, 255, 255, 0.25);
         border-color: rgba(255, 255, 255, 0.3);
         box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.1);
         outline: none;
     }

     /* ナビゲーションボタン共通スタイル */
     .nav-buttons {
         gap: 8px;
     }

     /* カート、ログイン、プロファイルボタンの共通スタイル */
     .cart-button, .login-button, .profile-button {
         color: #ffffff !important;
         font-size: 1.1rem;
         font-weight: 600;
         text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
         background: rgba(255, 255, 255, 0.1);
         border-radius: 8px;
         padding: 8px 20px !important;
         margin: 0 5px;
         display: flex;
         align-items: center;
         gap: 8px;
         border: none;
         transition: all 0.3s ease;
     }

     .cart-button:hover, .login-button:hover, .profile-button:hover {
         background: rgba(255, 255, 255, 0.2);
         transform: translateY(-2px);
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
     }

     /* アイコンのスタイル統一 */
     .cart-button i, .login-button i, .profile-button i {
         font-size: 1.2rem;
         color: #ffffff;
     }

     /* テキストのスタイル統一 */
     .cart-button span, .login-button span, .profile-button span {
         color: #ffffff !important;
         font-weight: 600;
     }

     /* レスポンシブ対応 */
     @media (max-width: 991.98px) {
         .search-wrapper {
             width: 100%;
             margin: 10px 0;
         }

         .nav-buttons {
             flex-direction: column;
             width: 100%;
         }

         .cart-button, .login-button, .profile-button {
             width: 100%;
             margin: 5px 0;
             justify-content: center;
         }
     }
 `;
    document.head.appendChild(style);
}



// ページ読み込み時にヘッダーを作成
document.addEventListener('DOMContentLoaded', () => {

    createHeader();

    // カート数の更新
    if (typeof window.cartCount !== 'undefined') {
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = window.cartCount;
        }
    }
});

