document.title = "関西巡り"

const header = document.getElementById('header');
if (header) {
    header.insertAdjacentHTML('afterbegin', `
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-lg">
            <a class="navbar-brand" href="/"><strong>関西巡り</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav"></ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="cart.html">カート (２)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ログイン</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    `);
}

const navbar = document.querySelector(".navbar-nav");
if (navbar) {
    navbar.insertAdjacentHTML('beforeend', `
        <li class="nav-item">
            <a class="nav-link" href="/place">観光地の紹介</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="plan.html">プラン</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">イベント</a>
        </li>
    `);
}
