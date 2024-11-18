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
                                <p>神戸港を一望できる展望台から夕暮れ時の景色�����む。</p>
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
                @elseif($planId === 'kyoto')
                <!-- 京都プラン -->
                <div class="plan-section">
                    <h1 class="display-4 mb-4">京都での一日遊びプラン</h1>
                    <div class="plan-description mb-4">
                        <p>千年の都・京都の歴史と文化を堪能する、観光＆グルメプランをご紹介します！</p>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity">
                                <h3>9:00 AM - 金閣寺</h3>
                                <p>世界遺産・金閣寺で美しい庭園と金箔に輝く建物を鑑賞。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 市バス「金閣寺道」下車すぐ</p>
                            </div>
                            <div class="activity">
                                <h3>11:00 AM - 龍安寺</h3>
                                <p>有名な枯山水の石庭を鑑賞し、日本の禅文化を体験。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 市バス「龍安寺前」下車すぐ</p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:30 PM - 嵐山エリア</h3>
                                <p>老舗の湯豆腐料理店で京料理を堪能。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 阪急「嵐山駅」から徒歩5分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>2:00 PM - 竹林の小径</h3>
                                <p>風情ある竹林の散策路を歩き、写真撮影スポットも。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「嵯峨嵐山駅」から徒歩15分</p>
                            </div>
                            <div class="activity">
                                <h3>4:00 PM - 清水寺</h3>
                                <p>世界遺産の清水寺で夕暮れ時の京都を一望。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 市バス「清水道」から徒歩15分</p>
                            </div>
                        </div>

                        <!-- 夕方・夜 -->
                        <div class="time-block">
                            <h2><i class="bi bi-moon-stars"></i> 夕方・夜</h2>
                            <div class="activity">
                                <h3>6:00 PM - 祇園</h3>
                                <p>石畳の街並みを散策し、舞妓さんに出会えるかも。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 京阪「祇園四条駅」から徒歩5分</p>
                            </div>
                            <div class="activity">
                                <h3>7:30 PM - 先斗町</h3>
                                <p>京都の風情ある路地で夜のディナーを楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 京阪「祇園四条駅」から徒歩8分</p>
                            </div>
                        </div>
                    </div>
                </div>

                @elseif($planId === 'nara')
                <!-- 奈良プラン -->
                <div class="plan-section">
                    <h1 class="display-4 mb-4">奈良での一日遊びプラン</h1>
                    <div class="plan-description mb-4">
                        <p>古都奈良の世界遺産と可愛い鹿たちに出会う、歴史探訪プランをご紹介します！</p>
                    </div>

                    <div class="timeline">
                        <!-- 午前 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity">
                                <h3>9:00 AM - 東大寺</h3>
                                <p>世界最大級の木造建築と大仏様を参拝。朝は観光客も少なめ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「奈良駅」から徒歩45分、または市内循環バス「東大寺大仏殿前」下車</p>
                            </div>
                            <div class="activity">
                                <h3>10:30 AM - 奈良公園</h3>
                                <p>鹿せんべいを購入して鹿とふれあい。写真撮���も楽しめます。</p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:00 PM - 奈良町エリア</h3>
                                <p>古い町並みの中で茶がゆや奈良の郷土料理を堪能。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「奈良駅」から徒歩15分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>2:00 PM - 春日大社</h3>
                                <p>朱塗りの本殿と数々の灯籠が印象的な神社を参拝。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 市内循環バス「春日大社本殿」下車</p>
                            </div>
                            <div class="activity">
                                <h3>4:00 PM - 興福寺</h3>
                                <p>五重塔と国宝館で仏像鑑賞。阿修羅像は必見。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「奈良駅」から徒歩10分</p>
                            </div>
                        </div>

                        <!-- 夕方・夜 -->
                        <div class="time-block">
                            <h2><i class="bi bi-moon-stars"></i> 夕方・夜</h2>
                            <div class="activity">
                                <h3>6:00 PM - ならまち</h3>
                                <p>江戸時代からの町家が立ち並ぶ地区で買い物を楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「奈良駅」から徒歩15分</p>
                            </div>
                            <div class="activity">
                                <h3>7:30 PM - もちいどの商店街</h3>
                                <p>地元の雰囲気漂う商店街で夕食を楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「奈良駅」から徒歩10分</p>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($planId === 'kyoto-temples')
                <!-- 京都寺社仏閣巡りプラン -->
                <div class="plan-section">
                    <h1 class="display-4 mb-4">京都寺社仏閣巡り2日間プラン</h1>
                    <div class="plan-description mb-4">
                        <p>世界遺産の寺社仏閣を巡り、京都の歴史と文化を深く体験する2日間のプランです。</p>
                    </div>

                    <div class="timeline">
                        <!-- 1日目 -->
                        <h2 class="day-title"><i class="bi bi-calendar-check"></i> 1日目</h2>

                        <!-- 午前 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity">
                                <h3>9:00 AM - 伏見稲荷大社</h3>
                                <p>千本鳥居で有名な神社。早朝は観光客も少なく、神秘的な雰囲気を楽しめます。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「稲荷駅」下車すぐ</p>
                            </div>
                            <div class="activity">
                                <h3>11:00 AM - 東福寺</h3>
                                <p>紅葉の名所として知られる禅寺。通天橋からの眺めは絶景。</p>
                                <p class="access"><i class="bi bi-train-front"></i> JR「東福寺駅」から徒歩10分</p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:30 PM - 清水寺周辺</h3>
                                <p>京都の伝統的な湯葉料理や精進料理を堪能。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 市バス「清水道」から徒歩5分</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>2:00 PM - 清水寺</h3>
                                <p>世界遺産の清水寺で京都の街並みを一望。</p>
                            </div>
                            <div class="activity">
                                <h3>4:00 PM - 八坂神社</h3>
                                <p>祇園の総鎮守として知られる神社を参拝。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 京阪「祇園四条駅」から徒歩5分</p>
                            </div>
                        </div>

                        <!-- 夜 -->
                        <div class="time-block">
                            <h2><i class="bi bi-moon-stars"></i> 夜</h2>
                            <div class="activity">
                                <h3>6:00 PM - 祇園</h3>
                                <p>京都の伝統的な町家で夕食を楽しみ、夜の祇園を散策。</p>
                            </div>
                        </div>

                        <!-- 2日目 -->
                        <h2 class="day-title mt-5"><i class="bi bi-calendar-check"></i> 2日目</h2>

                        <!-- 午前 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sunrise"></i> 午前</h2>
                            <div class="activity">
                                <h3>9:00 AM - 金閣寺</h3>
                                <p>朝一番で金閣寺を訪れ、静寂な空気の中で庭園を楽しむ。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 市バス「金閣寺道」下車すぐ</p>
                            </div>
                            <div class="activity">
                                <h3>11:00 AM - 龍安寺</h3>
                                <p>世界遺産の枯山水庭園で禅の世界を体験。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 市バス「龍安寺前」下車すぐ</p>
                            </div>
                        </div>

                        <!-- 昼食 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 昼食</h2>
                            <div class="activity">
                                <h3>12:30 PM - 嵯峨野</h3>
                                <p>竹林の風情を感じながら、京懐石を楽しむ。</p>
                            </div>
                        </div>

                        <!-- 午後 -->
                        <div class="time-block">
                            <h2><i class="bi bi-sun"></i> 午後</h2>
                            <div class="activity">
                                <h3>2:00 PM - 天龍寺</h3>
                                <p>世界遺産の禅寺。美しい庭園は必見。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 阪急「嵐山駅」から徒歩10分</p>
                            </div>
                            <div class="activity">
                                <h3>4:00 PM - 二条城</h3>
                                <p>徳川幕府の象徴的建造物。豪華絢爛な内装や庭園を見学。</p>
                                <p class="access"><i class="bi bi-train-front"></i> 地下鉄「二条城前駅」から徒歩5分</p>
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
