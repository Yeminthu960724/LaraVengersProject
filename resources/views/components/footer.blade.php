<!-- カスタムフッター -->
<footer class="custom-footer">
    <div class="footer-wrapper">
        <!-- サイト情報 -->
        <div class="footer-section">
            <h3>サイト情報</h3>
            <ul>
                <li>
                    <a href="{{ route('about') }}">
                        ℹ️ About Us
                    </a>
                </li>
                <li>
                    <a href="{{ route('terms') }}">
                        📄 利用規約
                    </a>
                </li>
                <li>
                    <a href="{{ route('privacy') }}">
                        🔒 プライバシーポリシー
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
                        📚 ご利用ガイド
                    </a>
                </li>
                <li>
                    <a href="{{ route('faq') }}">
                        ❓ よくある質問
                    </a>
                </li>
            </ul>
        </div>

        <!-- SNSリンク -->
        <div class="footer-section">
            <h3>SNSでフォロー</h3>
            <div class="social-links">
                <a href="#">𝕏 Twitter</a>
                <a href="#">📘 Facebook</a>
                <a href="#">📸 Instagram</a>
            </div>
        </div>
    </div>

    <!-- コピーライト -->
    <div class="copyright">
        <p>&copy; 2024 関西巡り All Rights Reserved.</p>
    </div>
</footer>

<style>
.custom-footer {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    padding: 4rem 1rem;
    font-family: "Hiragino Kaku Gothic Pro", "メイリオ", sans-serif;
    color: #fff;
}

.footer-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    gap: 4rem;
    text-align: center;
}

.footer-section h3 {
    color: #fff;
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.05em;
}

.footer-section h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 2px;
    background: #fff;
}

.footer-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-section ul li {
    margin-bottom: 1.2rem;
}

.footer-section ul li a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    letter-spacing: 0.03em;
}

.footer-section ul li a:hover {
    color: #fff;
    transform: translateY(-2px);
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
}

.social-links {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
    align-items: center;
}

.social-links a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    font-size: 0.95rem;
}

.social-links a:hover {
    color: #fff;
    transform: translateY(-2px);
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
}

.copyright {
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
    margin-top: 3rem;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    font-size: 0.9rem;
    letter-spacing: 0.02em;
}

@media (max-width: 768px) {
    .footer-wrapper {
        flex-direction: column;
        gap: 3rem;
    }

    .footer-section {
        padding: 0 1rem;
    }

    .footer-section ul li a:hover,
    .social-links a:hover {
        transform: scale(1.05);
    }
}
</style>
