<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
            text-align: center;
        }
        .button-container {
            text-align: center; /* Untuk memusatkan tombol */
            margin-top: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold; /* Membuat teks menjadi tebal */
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Konfirmasi Akun Anda</h2>
        <p>Klik tombol di bawah ini untuk mengonfirmasi akun Anda:</p>
        <div class="button-container">
            <a href="{{ route('konfirmasi', ['id' => $id]) }}">Konfirmasi Akun</a>
        </div>
    </div>
</body>
</html>
