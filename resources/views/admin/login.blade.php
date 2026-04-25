<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <style>
        /* ===== GLOBAL ===== */
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
        }

        /* ===== HERO BACKGROUND (TETAP) ===== */
        .login-hero {
            position: relative;
            min-height: 100vh;
            display: grid;
            place-items: center;
            overflow: hidden;

            background: linear-gradient(120deg, #0b4da2, #1e90ff, #0b4da2);
            background-size: 200% 200%;
            animation: gradientMove 10s ease infinite;
        }

        

        /* ===== LOGIN BOX (PUTIH & ELEGAN) ===== */
        .login-box {
            position: relative;
            z-index: 2;
            width: 360px;
            padding: 34px 30px;
            border-radius: 22px;

            background: #ffffff;
            box-shadow: 0 25px 55px rgba(0,0,0,.25);
        }

        .login-box h3 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 26px;
            color: #0b4da2;
        }

        /* INPUT */
        .login-box input {
            width: 90%;
            padding: 14px 16px;
            margin-top: 14px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            outline: none;
            font-size: 14px;
            transition: .25s;
        }

        .login-box input:focus {
            border-color: #1e90ff;
            box-shadow: 0 0 0 3px rgba(30,144,255,.15);
        }

        /* BUTTON */
        .login-box button {
            width: 100%;
            margin-top: 22px;
            padding: 14px;
            border: none;
            border-radius: 30px;

            background: linear-gradient(135deg, #0b4da2, #1e90ff);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .login-box button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(30,144,255,.4);
        }

        /* ERROR */
        .error {
            margin-bottom: 14px;
            color: #b91c1c;
            background: #fee2e2;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 14px;
        }

        /* LINK AREA */
        .login-footer {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
            color: #475569;
        }

        .login-footer a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        
    </style>
</head>

<body>

<div class="login-hero">
    <div class="login-lines"></div>

    <div class="login-box">
        <h3>Login Admin</h3>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/admin/login">
            @csrf

            <input type="email" name="email" placeholder="Email admin" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>

        <div class="login-footer">
            <p>
                Belum punya akun admin?
                <a href="{{ route('admin.register.store') }}">Daftar di sini</a>
            </p>
            <p>
                <a href="{{ route('home') }}">← Kembali ke Home</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
