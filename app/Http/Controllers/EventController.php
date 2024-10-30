<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        return view('event');
    }

    public function getEvents(Request $request)
    {
        try {
            $events = $this->getEventData();

            // キーワード検索
            if ($request->keyword) {
                $events = array_filter($events, function($event) use ($request) {
                    return str_contains(mb_strtolower($event['title']), mb_strtolower($request->keyword)) ||
                        str_contains(mb_strtolower($event['description']), mb_strtolower($request->keyword));
                });
            }

            // エリアでフィルタリング
            if ($request->area) {
                $events = array_filter($events, function($event) use ($request) {
                    $area = mb_strtolower($request->area);
                    $location = mb_strtolower($event['location']);

                    switch($area) {
                        case 'osaka':
                            return str_contains($location, '大阪');
                        case 'kyoto':
                            return str_contains($location, '京都');
                        case 'kobe':
                            return str_contains($location, '神戸');
                        case 'nara':
                            return str_contains($location, '奈良');
                        default:
                            return true;
                    }
                });
            }

            // カテゴリーでフィルタリング
            if ($request->category) {
                $events = array_filter($events, function($event) use ($request) {
                    return $event['category'] === $request->category;
                });
            }

            // 結果が空の場合のチェック
            if (empty($events)) {
                return response()->json([]);
            }

            return response()->json(array_values($events));
        } catch (\Exception $e) {
            return response()->json(['error' => 'イベント情報の取得に失敗しました'], 500);
        }
    }

    public function detail($id)
    {
        $events = $this->getEventData();
        $event = collect($events)->firstWhere('id', (int)$id);

        if (!$event) {
            abort(404);
        }

        return view('event-detail', [
            'event' => $event,
            'googleMapsApiKey' => env('GOOGLE_MAPS_API_KEY')
        ]);
    }

    private function getEventData()
    {
        $now = Carbon::now();
        $defaultImage = '/images/events/default_event.jpg';

        return [
            [
                'id' => 1,
                'title' => '天神祭',
                'description' => '日本三大祭の一つ。大阪天満宮の祭礼で、船渡御や奉納花火など様々な行事が行われます。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(30)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(31)->format('Y-m-d'),
                'category' => '祭り',
                'location' => '大阪天満宮（大阪）',
                'status' => '開催予定'
            ],
            [
                'id' => 2,
                'title' => '住吉祭',
                'description' => '住吉大社の夏祭。御鳳輦(ごほうれん)渡御をはじめ、様々な神事が執り行われます。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(45)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(46)->format('Y-m-d'),
                'category' => '祭り',
                'location' => '住吉大社（大阪）',
                'status' => '開催予定'
            ],
            [
                'id' => 7,
                'title' => 'なにわ淀川花火大会',
                'description' => '大阪を代表する花火大会。約10,000発の花火が夜空を彩ります。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(40)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(40)->format('Y-m-d'),
                'category' => '花火大会',
                'location' => '淀川河川公園（大阪）',
                'status' => '開催予定'
            ],
            [
                'id' => 8,
                'title' => '関西ラーメンフェスティバル',
                'description' => '関西各地の人気ラーメン店が集結する大規模グルメイベント。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(20)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(22)->format('Y-m-d'),
                'category' => 'グルメ',
                'location' => '大阪城公園（大阪）',
                'status' => '開催予定'
            ],
            [
                'id' => 9,
                'title' => '京都音楽祭',
                'description' => '伝統音楽から現代音楽まで、様々なジャンルの音楽が楽しめる音楽祭。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(50)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(52)->format('Y-m-d'),
                'category' => '音楽',
                'location' => '岡崎公園（京都）',
                'status' => '開催予定'
            ],
            [
                'id' => 10,
                'title' => '五山送り火',
                'description' => '京都の夏を代表する伝統行事。山に浮かび上がる「大」の字が有名です。',
                'image_url' => $defaultImage,
                'start_date' => $now->copy()->addDays(55)->format('Y-m-d'),
                'end_date' => $now->copy()->addDays(55)->format('Y-m-d'),
                'category' => '伝統行事',
                'location' => '京都市内の五山（京都）',
                'status' => '開催予定'
            ]
        ];
    }
}
