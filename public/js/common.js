document.title = "関西巡り"

const header = document.getElementById('header');
if (header) {
    header.insertAdjacentHTML('afterbegin', `
        <nav class="navbar navbar-expand-lg bg-white shadow-sm">
            <div class="container-lg">
                <a class="navbar-brand fw-bold" href="/" style="font-size: 1.4rem; color: #2c3e50;">
                    関西巡り
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto" style="gap: 1.5rem;">
                        <li class="nav-item">
                            <a class="nav-link main-menu px-3 position-relative" href="Place" style="font-size: 1.1rem;">
                                観光地紹介
                                <span class="position-absolute bottom-0 start-50 translate-middle-x" style="width: 0%; height: 2px; background-color: #3498db; transition: width 0.3s;"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu px-3 position-relative" href="Plan" style="font-size: 1.1rem;">
                                プラン
                                <span class="position-absolute bottom-0 start-50 translate-middle-x" style="width: 0%; height: 2px; background-color: #3498db; transition: width 0.3s;"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-menu px-3 position-relative" href="Event" style="font-size: 1.1rem;">
                                イベント
                                <span class="position-absolute bottom-0 start-50 translate-middle-x" style="width: 0%; height: 2px; background-color: #3498db; transition: width 0.3s;"></span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav" style="gap: 1rem;">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="Cart" style="font-size: 0.9rem;">
                                <i class="bi bi-cart me-1"></i>
                                カート <span class="badge bg-primary ms-1 cart-count">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="/login" style="font-size: 0.9rem;">
                                <i class="bi bi-person me-1"></i>
                                ログイン
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    `);

    // メインメニューのみにホバーエフェクトを適用
    document.querySelectorAll('.nav-link.main-menu').forEach(link => {
        link.addEventListener('mouseenter', function() {
            const line = this.querySelector('span');
            if (line) {
                line.style.width = '100%';
            }
            this.style.color = '#3498db';
        });

        link.addEventListener('mouseleave', function() {
            const line = this.querySelector('span');
            if (line) {
                line.style.width = '0%';
            }
            this.style.color = '';
        });
    });
}

