<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>

<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <h3>新規登録</h3>
        </div>

        <div class="register-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">お名前</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">メールアドレス</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">パスワード</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           required>
                    <div class="password-requirements">
                        <small>パスワードの要件：</small>
                        <ul>
                            <li>8文字以上</li>
                            <li>英字と数字を含む</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">パスワード（確認）</label>
                    <input type="password"
                           class="form-control"
                           id="password_confirmation"
                           name="password_confirmation"
                           required>
                </div>

                <button type="submit" class="btn btn-register">
                    登録する
                </button>
            </form>

            <div class="login-link">
                すでにアカウントをお持ちの方は<a href="{{ url('/login') }}">こちら</a>
            </div>

            <div class="terms-text">
                登録することで、利用規約とプライバシーポリシーに同意したことになります。
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
