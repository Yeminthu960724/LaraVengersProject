<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プラン詳細 - 関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plan-detail.css') }}">
</head>
<body>
    <header id="header"></header>

    <main>
        <div class="container">
            <div class="content-card">
                @if($planId === 'osaka')
                <!-- 大阪プラン -->
                <div class="plan-section mb-5">
                    <h1 class="display-4 mb-4">大阪での一日遊びプラン</h1>
                    <div class="plan-description mb-4">
                        <p>大阪の魅力を凝縮した、観光・グルメ・エンタメを楽しむ欲張りプランをご紹介します！</p>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity">
                                <h3>9:00 AM - 大阪城公園</h3>
                                <p>天守閣から大阪市内を一望し、歴史も学べます。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR大阪環状線「大阪城公園駅」下車すぐ</p>
                            </div>
                            <div class="activity">
                                <h3>10:30 AM - 大阪城公園散策</h3>
                                <p>公園内を散策し、桜門や石垣などもチェック。</p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 道頓堀エリア</h3>
                                <p>たこ焼きやお好み焼きなどの大阪名物を堪能。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「なんば駅」から徒歩5分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>1:30 PM - 心斎橋筋商店街</h3>
                                <p>ショッピングやカフェタイムを楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「心斎橋駅」直結</p>
                            </div>
                            <div class="activity">
                                <h3>3:00 PM - 通天閣・新世界エリア</h3>
                                <p>昭和のレトロな雰囲気を味わい、串カツなどの軽食をどうぞ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「動物園前駅」から徒歩3分</p>
                            </div>
                        </div>

                        <!-- 夕方 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sunset"></i> 夕方</h2>
                            <div class="activity">
                                <h3>5:00 PM - 梅田スカイビル</h3>
                                <p>空中庭園展望台で夕焼けと夜景を楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「大阪駅」から徒歩10分</p>
                            </div>
                        </div>

                        <!-- 夜 -->
                        <div class="time-block">
                            <h2><i class="bi bi-moon-stars"></i> 夜</h2>
                            <div class="activity">
                                <h3>7:00 PM - なんばグランド花月</h3>
                                <p>お笑いライブを観賞（事前予約がおすすめ）。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「なんば駅」から徒歩5分</p>
                            </div>
                            <div class="activity">
                                <h3>9:00 PM - なんば周辺</h3>
                                <p>夕食を取り、夜の大阪を堪能。</p>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($planId === 'kobe')
                <!-- 神戸プラン -->
                <div class="plan-section">
                    <h1 class="display-4 mb-4">神戸での一日遊びプラン</h1>
                    <div class="plan-description mb-4">
                        <p>異国情緒あふれる港町・神戸を満喫する、グルメ＆観光プランをご紹介します！</p>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity">
                                <h3>9:00 AM - 南京町</h3>
                                <p>中華街で朝食や点心を楽しみ、異国情緒を味わう。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 各線「元町駅」から徒歩5分</p>
                            </div>
                            <div class="activity">
                                <h3>10:30 AM - 旧居留地</h3>
                                <p>異国情緒漂う歴史的建造物を見学。</p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 北野異人館街</h3>
                                <p>異人館でのランチと街並み散策を楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 各線「三宮駅」からバス15分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>2:00 PM - メリケンパーク・ハーバーランド</h3>
                                <p>港町の雰囲気を楽しみながら、ショッピングも。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「神戸駅」から徒歩10分</p>
                            </div>
                            <div class="activity">
                                <h3>4:00 PM - 神戸ポートタワー</h3>
                                <p>神戸港を一望できる展望台から夕暮れ時の景色を楽しむ。</p>
                            </div>
                        </div>

                        <!-- 夕方・夜 -->
                        <div class="time-block">
                            <h2><i class="bi bi-moon-stars"></i> 夕方・夜</h2>
                            <div class="activity">
                                <h3>6:00 PM - 南京町or北野</h3>
                                <p>神戸牛や中華料理など、神戸の味覚を堪能。</p>
                            </div>
                            <div class="activity">
                                <h3>8:00 PM - モザイク</h3>
                                <p>ライトアップされた港の夜景を楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「神戸駅」から徒歩15分</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>

    <footer id="footer"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
