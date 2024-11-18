<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = $this->getEventData();
        return view('event', ['events' => $events]);
    }

    public function detail($id)
    {
        $events = $this->getEventData();
        $event = collect($events)->firstWhere('id', (int)$id);

        if (!$event) {
            abort(404);
        }

        // イベントのステータスを設定
        $now = Carbon::now();
        $startDate = Carbon::parse($event['start_date']);
        $endDate = isset($event['end_date']) ? Carbon::parse($event['end_date']) : $startDate;

        if ($now->lt($startDate)) {
            $event['status'] = '開催予定';
        } elseif ($now->gt($endDate)) {
            $event['status'] = '終了';
        } else {
            $event['status'] = '開催中';
        }

        // アクセス情報がない場合のデフォルト値を設定
        $event['access'] = $event['access'] ?? '最寄り駅からのアクセス情報';
        $event['organizer'] = $event['organizer'] ?? 'イベント主催者';
        $event['website'] = $event['website'] ?? '#';
        $event['details'] = $event['details'] ?? $event['description'];
        $event['price'] = $event['price'] ?? 0;

        return view('event-detail', [
            'event' => $event,
            'googleMapsApiKey' => env('GOOGLE_MAPS_API_KEY')
        ]);
    }

    private function getEventData()
    {
        $defaultImage = '/images/events/default_event.jpg';

        return [
            1 => [
                'id' => 1,
                'title' => '天神祭',
                'description' => '大阪天満宮の氏祭で、日本三大祭の一つ。船渡御や奉納花火など、壮大な祭事が行われます。',
                'image_url' => $defaultImage,
                'category' => '祭り',
                'start_date' => '2024-07-24',
                'end_date' => '2024-07-25',
                'location' => '大阪天満宮',
                'price' => 0,
                'status' => '開催予定',
                'access' => '大阪市営地下鉄堺筋線・谷町線「南森町駅」から徒歩5分',
                'organizer' => '大阪天満宮',
                'contact' => '06-6353-0025',
                'website' => 'https://www.tenjinsan.com'
            ],
            2 => [
                'id' => 2,
                'title' => '祇園祭',
                'description' => '京都の八坂神社の祭礼で、約1100年の歴史を持つ日本を代表する祭り。山鉾巡行が有名です。',
                'image_url' => $defaultImage,
                'category' => '祭り',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-31',
                'location' => '八坂神社',
                'price' => 0,
                'status' => '開催予定',
                'access' => '京都市営地下鉄「祇園四条駅」から徒歩5分',
                'organizer' => '八坂神社',
                'contact' => '075-561-6155',
                'website' => 'https://www.gion-matsuri.jp'
            ],
            3 => [
                'id' => 3,
                'title' => 'なにわ淀川花火大会',
                'description' => '大阪を代表する花火大会。約4000発の花火が夜空を彩ります。',
                'image_url' => $defaultImage,
                'category' => '花火大会',
                'start_date' => '2024-08-08',
                'end_date' => '2024-08-08',
                'location' => '淀川河川公園',
                'price' => 0,
                'status' => '開催予定',
                'access' => '阪急電鉄「十三駅」から徒歩10分',
                'organizer' => 'なにわ淀川花火大会実行委員会',
                'contact' => '06-XXXX-XXXX',
                'website' => 'https://www.yodogawa-hanabi.com'
            ],
            4 => [
                'id' => 4,
                'title' => '神戸ルミナリエ',
                'description' => '阪神・淡路大震災の鎮魂と復興への願いを込めて開催される光の祭典。',
                'image_url' => $defaultImage,
                'category' => 'イルミネーション',
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-12',
                'location' => '神戸市中央区',
                'price' => 0,
                'status' => '開催予定',
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩5分',
                'organizer' => '神戸ルミナリエ組織委員会',
                'contact' => '078-XXX-XXXX',
                'website' => 'https://www.kobe-luminarie.jp'
            ],
            5 => [
                'id' => 5,
                'title' => '奈良燈花会',
                'description' => '奈良の夏の風物詩。約2万個のろうそが奈良公園を幻想的に照らします。',
                'image_url' => $defaultImage,
                'category' => 'イベント',
                'start_date' => '2024-08-05',
                'end_date' => '2024-08-14',
                'location' => '奈良公園',
                'price' => 0,
                'status' => '開催予定',
                'access' => 'JR「奈良駅」から徒歩20分',
                'organizer' => '奈良燈花会の会',
                'contact' => '0742-XX-XXXX',
                'website' => 'https://www.toukae.jp'
            ],
            6 => [
                'id' => 6,
                'title' => '京都五山送り火',
                'description' => 'お盆の夜空に浮かび上がる「大」の字。京都の伝統行事です。',
                'image_url' => $defaultImage,
                'category' => '祭り',
                'start_date' => '2024-08-16',
                'end_date' => '2024-08-16',
                'location' => '京都市内の五山',
                'price' => 0,
                'status' => '開催予定',
                'access' => '各山により異なります',
                'organizer' => '京都五山送り火連合会',
                'contact' => '075-XXX-XXXX',
                'website' => 'https://www.gozan.kyoto/'
            ],
            7 => [
                'id' => 7,
                'title' => '住吉祭',
                'description' => '住吉大社の夏祭り。御鳳輦(ごほうれん)渡御が有名です。',
                'image_url' => $defaultImage,
                'category' => '祭り',
                'start_date' => '2024-07-30',
                'end_date' => '2024-08-01',
                'location' => '住吉大社',
                'price' => 0,
                'status' => '開催予定',
                'access' => '南海本線「住吉大社駅」から徒歩3分',
                'organizer' => '住吉大社',
                'contact' => '06-XXXX-XXXX',
                'website' => 'https://www.sumiyoshitaisha.net/'
            ],
            8 => [
                'id' => 8,
                'title' => '神戸まつり',
                'description' => '神戸の街を彩るサンバパレードなど、国際色豊かなお祭り。',
                'image_url' => $defaultImage,
                'category' => '祭り',
                'start_date' => '2024-05-19',
                'end_date' => '2024-05-19',
                'location' => '神戸市中央区',
                'price' => 0,
                'status' => '開催予定',
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩圏内',
                'organizer' => '神戸まつり委員会',
                'contact' => '078-XXX-XXXX',
                'website' => 'https://www.kobe-matsuri.com/'
            ],
            9 => [
                'id' => 9,
                'title' => '葵祭',
                'description' => '京都三大祭の一つ。平安時代さながらの優雅な時代行列。',
                'image_url' => $defaultImage,
                'category' => '祭り',
                'start_date' => '2024-05-15',
                'end_date' => '2024-05-15',
                'location' => '下鴨神社、上賀茂神社',
                'price' => 0,
                'status' => '開催予定',
                'access' => '京都市営地下鉄「今出川駅」から徒歩15分',
                'organizer' => '葵祭行列保存会',
                'contact' => '075-XXX-XXXX',
                'website' => 'https://www.aoi-matsuri.jp/'
            ],
            10 => [
                'id' => 10,
                'title' => 'なら燈火会',
                'description' => '奈良の夜を幻想的に彩るろうそくの光のイベント。',
                'image_url' => $defaultImage,
                'category' => 'イベント',
                'start_date' => '2024-08-05',
                'end_date' => '2024-08-14',
                'location' => '奈良公園周辺',
                'price' => 0,
                'status' => '開催予定',
                'access' => 'JR「奈良駅」から徒歩15分',
                'organizer' => 'なら燈火会実行委員会',
                'contact' => '0742-XX-XXXX',
                'website' => 'https://www.toukae-nara.jp/'
            ],
            11 => [
                'id' => 11,
                'title' => 'みなとこうべ海上花火大会',
                'description' => '神戸港を舞台に繰り広げられる華やかな花火大会。',
                'image_url' => $defaultImage,
                'category' => '花火大会',
                'start_date' => '2024-08-03',
                'end_date' => '2024-08-03',
                'location' => '神戸港',
                'price' => 0,
                'status' => '開催予定',
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩10分',
                'organizer' => 'みなとこうべ海上花火大会実行委員会',
                'contact' => '078-XXX-XXXX',
                'website' => 'https://www.kobehanabi.jp/'
            ],
            12 => [
                'id' => 12,
                'title' => '京都食博',
                'description' => '京都の伝統的な食文化を体験できる食の祭典。',
                'image_url' => $defaultImage,
                'category' => 'グルメ',
                'start_date' => '2024-09-15',
                'end_date' => '2024-09-23',
                'location' => '京都市内各所',
                'price' => 1500,
                'status' => '開催予定',
                'access' => '会場により異なります',
                'organizer' => '京都食博実行委員会',
                'contact' => '075-XXX-XXXX',
                'website' => 'https://www.kyoto-shokuhaku.jp/'
            ],
            13 => [
                'id' => 13,
                'title' => '大阪城3Dマッピング',
                'description' => '大阪城の壁面を使った壮大な3Dプロジェクションマッピング。',
                'image_url' => $defaultImage,
                'category' => 'イベント',
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-25',
                'location' => '大阪城',
                'price' => 2000,
                'status' => '開催予定',
                'access' => 'JR大阪環状線「大阪城公園駅」から徒歩5分',
                'organizer' => '大阪城3Dマッピング実行委員会',
                'contact' => '06-XXXX-XXXX',
                'website' => 'https://www.osaka-castle-illumination.jp/'
            ],
            14 => [
                'id' => 14,
                'title' => '奈良大仏全国ライトアップフェスティバル',
                'description' => '東大寺の大仏様を幻想的にライトアップするイベント。',
                'image_url' => $defaultImage,
                'category' => 'イベント',
                'start_date' => '2024-10-01',
                'end_date' => '2024-10-31',
                'location' => '東大寺',
                'price' => 1000,
                'status' => '開催予定',
                'access' => 'JR「奈良駅」から徒歩20分',
                'organizer' => '奈良大仏ライトアップ実行委員会',
                'contact' => '0742-XX-XXXX',
                'website' => 'https://www.todaiji-lightup.jp/'
            ],
            15 => [
                'id' => 15,
                'title' => '神戸ジャズストリート',
                'description' => '神戸の街角で繰り広げられる音楽の祭典。',
                'image_url' => $defaultImage,
                'category' => '音楽',
                'start_date' => '2024-10-12',
                'end_date' => '2024-10-13',
                'location' => '神戸市中央区',
                'price' => 3000,
                'status' => '開催予定',
                'access' => 'JR・阪急・阪神「三宮駅」から徒歩圏内',
                'organizer' => '神戸ジャズストリート実行委員会',
                'contact' => '078-XXX-XXXX',
                'website' => 'https://www.kobe-jazz.jp/'
            ],
            16 => [
                'id' => 16,
                'title' => '京都・嵐山花灯路',
                'description' => '嵐山一��をLEDの光で彩るライトアップイベント。竹林の道や渡月橋が幻想的な雰囲気に。',
                'image_url' => $defaultImage,
                'category' => 'イルミネーション',
                'start_date' => '2024-12-08',
                'end_date' => '2024-12-17',
                'location' => '京都市嵐山一帯',
                'price' => 0,
                'status' => '開催予定',
                'access' => '阪急電鉄「嵐山駅」から徒歩5分、JR嵯峨野線「嵯峨嵐山駅」から徒歩15分',
                'organizer' => '京都・花灯路推進協議会',
                'contact' => '075-XXX-XXXX',
                'website' => 'https://www.hanatouro.jp/arashiyama/'
            ],
            17 => [
                'id' => 17,
                'title' => '大阪オクトーバーフェスト',
                'description' => 'ドイツビールと料理を楽しむ野外フェスティバル。本場の雰囲気を大阪で体験できます。',
                'image_url' => $defaultImage,
                'category' => 'グルメ',
                'start_date' => '2024-09-20',
                'end_date' => '2024-10-02',
                'location' => '大阪城公園',
                'price' => 2500,
                'status' => '開催予定',
                'access' => 'JR大阪環状線「大阪城公園駅」から徒歩3分',
                'organizer' => '大阪オクトーバーフェスト実行委員会',
                'contact' => '06-XXXX-XXXX',
                'website' => 'https://www.oktober-fest.jp/'
            ],
            18 => [
                'id' => 18,
                'title' => '神戸イルミナージュ',
                'description' => '約100万球のLEDで彩られる光の王国。音楽とシンクロした幻想的な光の世界を体験できます。',
                'image_url' => $defaultImage,
                'category' => 'イルミネーション',
                'start_date' => '2024-11-01',
                'end_date' => '2024-12-25',
                'location' => '神戸市立須磨離宮公園',
                'price' => 1800,
                'status' => '開催予定',
                'access' => 'JR「須磨駅」から徒歩10分',
                'organizer' => '神戸イルミナージュ実行委員',
                'contact' => '078-XXX-XXXX',
                'website' => 'https://www.kobe-illuminage.jp/'
            ],
            19 => [
                'id' => 19,
                'title' => '奈良若草山焼き',
                'description' => '若草山の山焼き。古都奈良の冬の風物詩として知られる伝統行事。',
                'image_url' => $defaultImage,
                'category' => '祭り',
                'start_date' => '2024-01-27',
                'end_date' => '2024-01-27',
                'location' => '奈良若草山',
                'price' => 0,
                'status' => '開催予定',
                'access' => 'JR「奈良駅」から徒歩15分',
                'organizer' => '奈良市観光協会',
                'contact' => '0742-XX-XXXX',
                'website' => 'https://www.yamayaki.jp/'
            ],
            20 => [
                'id' => 20,
                'title' => '大阪光のルネサンス',
                'description' => '大阪市役所周辺を彩る光のアートフェスティバル。壮大な3Dマッピングも。',
                'image_url' => $defaultImage,
                'category' => 'イルミネーション',
                'start_date' => '2024-12-14',
                'end_date' => '2024-12-25',
                'location' => '大阪市中央公会堂周辺',
                'price' => 0,
                'status' => '開催予定',
                'access' => '地下鉄「淀屋橋駅」から徒歩3分',
                'organizer' => '大阪市',
                'contact' => '06-XXXX-XXXX',
                'website' => 'https://www.hikari-renaissance.jp/'
            ],
            21 => [
                'id' => 21,
                'title' => '京都・梅小路マルシェ',
                'description' => '京都の食材や雑貨が集まる定期市。地元グルメも楽しめます。',
                'image_url' => $defaultImage,
                'category' => 'グルメ',
                'start_date' => '2024-04-01',
                'end_date' => '2024-04-03',
                'location' => '梅小路公園',
                'price' => 0,
                'status' => '開催予定',
                'access' => 'JR京都駅から徒歩15分、市バス「梅小路公園前」下車すぐ',
                'organizer' => '京都市・梅小路公園マルシェ実行委員会',
                'contact' => '075-XXX-XXXX',
                'website' => 'https://www.kyoto-marche.jp/'
            ]
        ];
    }
}
