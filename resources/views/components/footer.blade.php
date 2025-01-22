<!-- カスタムフッター -->
<footer class="custom-footer text-white py-5">
    <div class="container">
        <div class="row justify-content-center text-center g-4">
            <!-- サイト情報 -->
            <div class="col-md-4 col-lg-3">
                <h3 class="h5 mb-4 position-relative pb-3 fw-bold">
                    サイト情報
                </h3>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="{{ route('about') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-link">
                            <span class="emoji-icon">ℹ️</span>About Us
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('terms') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-link">
                            <span class="emoji-icon">📄</span>利用規約
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('privacy') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-link">
                            <span class="emoji-icon">🔒</span>プライバシーポリシー
                        </a>
                    </li>
                </ul>
            </div>

            <!-- サポート -->
            <div class="col-md-4 col-lg-3">
                <h3 class="h5 mb-4 position-relative pb-3 fw-bold">
                    サポート
                </h3>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="{{ route('guide') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-link">
                            <span class="emoji-icon">📚</span>ご利用ガイド
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('faq') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-link">
                            <span class="emoji-icon">❓</span>よくある質問
                        </a>
                    </li>
                </ul>
            </div>

            <!-- SNSリンク -->
            <div class="col-md-4 col-lg-3">
                <h3 class="h5 mb-4 position-relative pb-3 fw-bold">
                    SNSでフォロー
                </h3>
                <div class="d-flex flex-column gap-3 align-items-center">
                    <a href="#" class="text-white-50 text-decoration-none hover-link">
                        <span class="emoji-icon">𝕏</span>Twitter
                    </a>
                    <a href="#" class="text-white-50 text-decoration-none hover-link">
                        <span class="emoji-icon">📘</span>Facebook
                    </a>
                    <a href="#" class="text-white-50 text-decoration-none hover-link">
                        <span class="emoji-icon">📸</span>Instagram
                    </a>
                </div>
            </div>
        </div>

        <!-- コピーライト -->
        <div class="text-center mt-5 pt-4 border-top border-white-50">
            <p class="text-white-50 mb-0">&copy; 2025 関西巡り All Rights Reserved.</p>
        </div>
    </div>
</footer>

<style>
.custom-footer {
    background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%);
    position: relative;
    overflow: hidden;
    box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);
}

.custom-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        to bottom,
        rgba(255, 255, 255, 0.1) 0%,
        rgba(255, 255, 255, 0) 100%
    );
    pointer-events: none;
}

.emoji-icon {
    display: inline-block;
    font-size: 1.2em;
    margin-right: 0.3em;
    filter: none;  /* 親要素の色指定を無視 */
    opacity: 1;    /* 完全な不透明度を保持 */
}

.hover-link {
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
    color: rgba(255, 255, 255, 0.9) !important;
    font-weight: 500;
    letter-spacing: 0.02em;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    display: inline-flex;
    align-items: center;
}

.hover-link i {
    color: rgba(255, 255, 255, 0.9);
}

.hover-link:hover {
    color: #fff !important;
    transform: translateY(-2px);
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
}

.hover-link:hover i {
    color: #fff;
}

.h5 {
    position: relative;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    color: #fff;
    font-weight: 600;
}

.h5::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 2px;
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
}

@media (max-width: 768px) {
    .hover-link:hover {
        transform: scale(1.05);
    }
}
</style>
