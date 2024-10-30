<!DOCTYPE html>
<html lang="en">
<head>
  <title>homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>関西巡</h1>
  <p>関西を巡る旅の計画を立てましょう！</p> 
 
  <div class="position-relative">
    <a href="/login" class="btn btn-dark position-absolute end-0 top-0 m-3">ログイン</a>
  </div>
</div>
  
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <h3>プラン作成のガイドライン</h3>
      <p>
       まず、訪れたい場所をいくつか選んでリストに追加しましょう。地域や
        <span class="more-text" id="moreText1" style="display:none;">
        マップ機能や、他のユーザーとの共有機能も利用できます。
        </span>
      </p>
      <button class="btn btn-link p-0" id="seeMoreBtn1">See more</button>
      <img src="{{ asset('images/home1.png') }}" alt="Home Image" class="img-thumbnail" width="304" height="236">
    </div>

    <div class="col-sm-4">
      <h3>プラン作成</h3>
      <p>
        当サイトでは旅のプランを簡単に作成し、保存することができます。
        <span class="more-text" id="moreText2" style="display:none;">
          マップ機能や、他のユーザーとの共有機能も利用できます。
        </span>
      </p>
      <button class="btn btn-link p-0" id="seeMoreBtn2">See more</button>
      <img src="{{ asset('images/home2.png') }}" alt="Home Image" class="img-thumbnail" width="304" height="236">
    </div>

    <div class="col-sm-4">
      <h3>私たちについて</h3>
      <p>
        当サイトでは旅のプランを簡単に作成し、保存することができます。
        <span class="more-text" id="moreText3" style="display:none;">
          マップ機能や、他のユーザーとの共有機能も利用できます。
        </span>
      </p>
      <button class="btn btn-link p-0" id="seeMoreBtn3">See more</button>
      <img src="{{ asset('images/home3.png') }}" alt="Home Image" class="img-thumbnail" width="304" height="236">
    </div>
  </div>
</div>

<script>
 
  document.querySelectorAll('.btn-link').forEach(button => {
    button.addEventListener('click', function() {
      const moreTextId = this.id.replace('seeMoreBtn', 'moreText');
      const moreText = document.getElementById(moreTextId);
      if (moreText.style.display === "none") {
        moreText.style.display = "inline";
        this.textContent = "See less"; 
      } else {
        moreText.style.display = "none";
        this.textContent = "See more"; 
      }
    });
  });
</script>

</body>
</html>
