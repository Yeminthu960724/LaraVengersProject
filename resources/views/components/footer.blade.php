<!-- カスタムフッター -->
<footer class="custom-footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- サイト情報 -->
            <div class="footer-section">
                <h3>サイト情報</h3>
                <ul>
                    <li>
                        <a href="{{ route('about') }}">
                            <span class="emoji-icon">ℹ️</span>About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}">
                            <span class="emoji-icon">📄</span>利用規約
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}">
                            <span class="emoji-icon">🔒</span>プライバシーポリシー
                        </a>
                    </li>
                </ul>
            </div>

            <!-- サポート -->
            <div class="footer-section">
                <h3>サポート</h3>
                <ul>
                    <li>
                        <a href="{{ route('guide') }}">
                            <span class="emoji-icon">📚</span>ご利用ガイド
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}">
                            <span class="emoji-icon">❓</span>よくある質問
                        </a>
                    </li>
                </ul>
            </div>

            <!-- SNSリンク -->
            <div class="footer-section">
                <h3>SNSでフォロー</h3>
                <div class="social-links">
                    <a href="#">
                        <span class="emoji-icon">𝕏</span>Twitter
                    </a>
                    <a href="#">
                        <span class="emoji-icon">📘</span>Facebook
                    </a>
                    <a href="#">
                        <span class="emoji-icon">📸</span>Instagram
                    </a>
                </div>
            </div>
        </div>

        <!-- コピーライト -->
        <div class="copyright">
            <p>&copy; 2025 関西巡り All Rights Reserved.</p>
        </div>
    </div>
</footer>

<style>
.custom-footer {
    background: #1B4B8F;
    padding: 2rem 1rem;
    color: white;
    margin-top: -1px;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
}

.footer-content {
    display: flex;
    justify-content: center;
    gap: 4rem;
    text-align: center;
}

.footer-section {
    flex: 0 1 auto;
}

.footer-section h3 {
    font-size: 0.95rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: rgba(255, 255, 255, 0.95);
}

.footer-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-section ul li {
    margin-bottom: 1rem;
}

.footer-section a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    font-size: 0.85rem;
    font-weight: 500;
    letter-spacing: 0.02em;
    transition: all 0.3s ease;
}

.emoji-icon {
    font-size: 1em;
    margin-right: 0.3em;
}

.social-links {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.footer-section a:hover {
    color: #fff;
    transform: translateY(-2px);
}

.copyright {
    text-align: center;
    margin-top: 2rem;
}

.copyright p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.8rem;
    margin: 0;
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        gap: 2rem;
    }

    .footer-section a:hover {
        transform: scale(1.05);
    }
}
</style>
