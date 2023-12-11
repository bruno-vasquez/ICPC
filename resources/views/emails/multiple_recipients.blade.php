<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncio Importante</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: #007BFF;">Anuncio Importante</h2>
        <p>{{ $messageContent }}</p>
    </div>
</body>
</html>