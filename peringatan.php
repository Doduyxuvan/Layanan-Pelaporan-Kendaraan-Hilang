<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peringatan Akses</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        .highlight {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
    <script>
        // Redirect setelah 5 detik
        setTimeout(function() {
            window.location.href = 'home.php';
        }, 5000); // 5000 ms = 5 detik
    </script>
</head>
<body>
    <div class="container">
        <h1>Peringatan!</h1>
        <p class="highlight">Anda tidak memiliki akses ke halaman ini.</p>
        <p>Anda akan dialihkan ke halaman utama dalam 5 detik...</p>
    </div>
</body>
</html>
