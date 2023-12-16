<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$nombre}}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #007bff; /* Azul */
    }

    p {
      color: #333333; /* Gris oscuro */
    }

    .cta-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #ffffff;
      text-decoration: none;
      border-radius: 5px;
    }

    .footer {
      margin-top: 20px;
      text-align: center;
      color: #777777; /* Gris claro */
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>¡Importante!</h1>
    <p>Estimado participante,</p>
    <p>Queremos informarte que ha habido una actualización de información en <b>{{$nombre}}</b>. A continuación, te proporcionamos más detalles:</p>

    <p>{{$messageContent }}</p>

    <p>Para obtener más información, sobre otros eventos y competencias por favor visita la página:</p>

    <a href="https://competencias-teal.vercel.app/" class="cta-button">Visitar la página</a>
    <br>
    <div class="footer">
      <p>Gracias por tu atención. Si tienes alguna pregunta, no dudes en ponerte en contacto con nosotros.</p>
    </div>
  </div>

</body>
</html>