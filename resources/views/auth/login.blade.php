<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3 class="text-center">ログイン</h3>
            </div>
            <div class="login-body">
                @if ($errors->has('login'))
                    <div class="alert">
                        {{ $errors->first('login') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                        <label for="email">メールアドレス</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <label for="password">パスワード</label>
                    </div>
                    <button type="submit" class="btn btn-login w-100 text-white">ログイン</button>
                </form>

                <div class="register-link">
                    アカウントをお持ちでない方は<a href="{{ route('register') }}">こちら</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
