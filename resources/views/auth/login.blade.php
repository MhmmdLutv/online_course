<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kursus App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #fff;
            border-radius: 1rem;
            padding: 2rem 3rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .login-card h3 {
            font-weight: 700;
            color: #4e54c8;
            margin-bottom: 1.5rem;
        }

        .btn-login {
            background-color: #4e54c8;
            border: none;
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #5d63d3;
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .text-link {
            color: #4e54c8;
        }

        .text-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <h3 class="text-center">Kursus Online Mantis</h3>

       <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input id="email" type="email" class="form-control" name="email"
                       value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <button type="submit" class="btn btn-login btn-block">Masuk</button>

            <div class="text-center mt-2">
                <span>Belum memiliki Akun?</span>
                <a class="text-link"  href="{{ route('register') }}">{{ __('Daftar') }}</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
