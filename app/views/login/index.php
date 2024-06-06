<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('<?= BASEURL ?>/img/backgroundLogin.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .login-container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 20px;
            border-radius: 8px;
            color: white;
            text-align: center;
            width: 300px;
        }
        
        .login-container h1 {
            margin-bottom: 20px;
        }
        
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
        }
        
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: hsl(57, 97%, 45%);
            border-color: hsl(57, 97%, 45%);
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        
        .login-container button:hover {
            background-color: hsl(57, 97%, 15%);
            ;
        }
        
        .login-container a {
            display: block;
            margin: 10px 0;
            color: #0071eb;
            text-decoration: none;
        }
        
        .login-container .recaptcha {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Masuk</h1>
        <form>
            <input type="text" placeholder="Email atau nomor ponsel" required>
            <input type="password" placeholder="Sandi" required>
            <button type="submit">Masuk</button>
            <a href="#">Gunakan Kode Masuk</a>
            <a href="#">Lupa sandi?</a>
            <div>
                <input type="checkbox" id="ingat-saya" name="ingat-saya">
                <label for="ingat-saya">Ingat saya</label>
            </div>
            <a href="<?= BASEURL ?>/register">Belum punya akun? Daftar sekarang.</a>
            <div class="recaptcha">
                Halaman ini dilindungi oleh reCAPTCHA Google untuk memastikan kamu bukan bot. <a href="#">Pelajari selengkapnya.</a>
            </div>
        </form>
    </div>
</body>

</html>