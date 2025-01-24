<!-- カスタムフッター -->
<footer class="custom-footer text-white py-4">
    <div class="container">
        <div class="row justify-content-center text-center g-3">
            <!-- サイト情報 -->
            <div class="col-md-4 col-lg-3">
                <h3 class="h6 mb-3">サイト情報</h3>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('about') }}" class="text-white text-decoration-none hover-link">
                            <span class="emoji-icon">ℹ️</span>About Us
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('terms') }}" class="text-white text-decoration-none hover-link">
                            <span class="emoji-icon">📄</span>利用規約
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('privacy') }}" class="text-white text-decoration-none hover-link">
                            <span class="emoji-icon">🔒</span>プライバシーポリシー
                        </a>
                    </li>
                </ul>
            </div>

            <!-- サポート -->
            <div class="col-md-4 col-lg-3">
                <h3 class="h6 mb-3">サポート</h3>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('guide') }}" class="text-white text-decoration-none hover-link">
                            <span class="emoji-icon">📚</span>ご利用ガイド
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('faq') }}" class="text-white text-decoration-none hover-link">
                            <span class="emoji-icon">❓</span>よくある質問
                        </a>
                    </li>
                </ul>
            </div>

            <!-- SNSリンク -->
            <div class="col-md-4 col-lg-3">
                <h3 class="h6 mb-3">SNSでフォロー</h3>
                <div class="d-flex flex-column gap-2">
                    <a href="#" class="text-white text-decoration-none hover-link">
                        <span class="emoji-icon">𝕏</span>Twitter
                    </a>
                    <a href="#" class="text-white text-decoration-none hover-link">
                        <span class="emoji-icon">📘</span>Facebook
                    </a>
                    <a href="#" class="text-white text-decoration-none hover-link">
                        <span class="emoji-icon">📸</span>Instagram
                    </a>
                </div>
            </div>
        </div>

        <!-- コピーライト -->
        <div class="text-center mt-4">
            <p class="text-white-50 mb-0">&copy; 2025 関西巡り All Rights Reserved.</p>
        </div>
    </div>
</footer>

<style>
.custom-footer {
    background: #1B4B8F;
}

.emoji-icon {
    display: inline-block;
    margin-right: 0.3em;
    filter: none;
}

.hover-link {
    transition: opacity 0.3s ease;
    font-size: 0.9rem;
}

.hover-link:hover {
    opacity: 0.8;
}

@media (max-width: 768px) {
    .custom-footer {
        font-size: 0.9rem;
    }
}
</style>
