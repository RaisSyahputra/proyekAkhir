<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('<?= BASEURL ?>/img/backgroundRegister.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .register-container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 20px;
            border-radius: 8px;
            color: white;
            text-align: center;
            width: 300px;
        }
        
        .register-container h1 {
            margin-bottom: 20px;
        }
        
        .register-container input[type="text"],
        .register-container input[type="password"],
        .register-container input[type="email"],
        .register-container input[type="tel"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
        }
        
        .register-container button {
            width: 100%;
            padding: 10px;
            background-color: #e50914;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        
        .register-container button:hover {
            background-color: #f40612;
        }
        
        .register-container a {
            display: block;
            margin: 10px 0;
            color: #0071eb;
            text-decoration: none;
        }
        
        .register-container .recaptcha {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1>Daftar</h1>
        <form>
            <input type="text" placeholder="Nama Lengkap" required>
            <input type="email" placeholder="Email" required>
            <input type="tel" placeholder="Nomor Ponsel" required>
            <input type="password" placeholder="Sandi" required>
            <button type="submit">Daftar</button>
            <a href="login.html">Sudah punya akun? Masuk sekarang.</a>
            <div class="recaptcha">
                Halaman ini dilindungi oleh reCAPTCHA Google untuk memastikan kamu bukan bot. <a href="#">Pelajari selengkapnya.</a>
            </div>
        </form>
    </div>
</body>

</html>