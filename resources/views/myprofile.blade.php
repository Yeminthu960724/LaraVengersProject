<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイプロフィール</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>
<body>

<div class="profile-container">
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>
    <div class="petal"></div>

    <div class="profile-card">
        <div class="profile-header">
            <h2>My Profile</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="section">
            <div class="section-title">基本情報</div>
            <div class="info-box">
                <div class="mb-3">
                    <strong>メールアドレス:</strong>
                    {{ $email ?? session('email') ?? '未ログイン' }}
                </div>
                <div class="mb-3">
                    <strong>ユーザー名:</strong>
                    {{ $username ?? session('username') ?? '未設定' }}
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">お気に入り場所</div>
            <div class="row">
                @if(isset($favorites) && count($favorites) > 0)
                    @foreach($favorites as $favorite)
                        <div class="col-md-6 mb-3">
                            <div class="favorite-item">
                                <h5>{{ $favorite->name }}</h5>
                                <p>{{ $favorite->description }}</p>
                                <a href="{{ url('/placeDetail/' . $favorite->id) }}" class="btn btn-sm btn-primary">詳細を見る</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>お気に入りの場所はまだありません</p>
                @endif
            </div>
        </div>

        <div class="section">
            <div class="section-title">パスワード変更</div>
            <form action="{{ url('/myprofile/password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">現在のパスワード</label>
                    <input type="password" class="form-control" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">新しいパスワード</label>
                    <input type="password" class="form-control" name="new_password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">新しいパスワード（確認）</label>
                    <input type="password" class="form-control" name="new_password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">パスワードを変更</button>
            </form>
        </div>

        <div class="section">
            <div class="section-title">アカウント管理</div>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 mb-3">ログアウト</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{ url('/myprofile/delete') }}" method="POST" onsubmit="return confirm('本当にアカウントを削除しますか？');">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">アカウントを削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
