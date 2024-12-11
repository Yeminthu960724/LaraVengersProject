<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h3>ログイン</h3>
        </div>

        <div class="login-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="name@example.com"
                           value="{{ old('email') }}"
                           required>
                    <label for="email">メールアドレス</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="パスワード"
                           required>
                    <label for="password">パスワード</label>
                </div>

                <button type="submit" class="btn btn-login">
                    ログイン
                </button>
            </form>

            <div class="register-link">
                アカウントをお持ちでない方は<a href="{{ url('/register') }}">こちら</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
