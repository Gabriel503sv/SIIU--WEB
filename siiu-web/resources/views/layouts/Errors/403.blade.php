<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Prohibido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .error-code {
            font-size: 10rem;
            font-weight: bold;
            color: #6E0000;
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .btn-back {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

    </style>
</head>
<body>
    <div class="container text-center">
        <div class="error-code ">403</div>
        <div class="error-message">No tienes los permisos para acceder aca .</div>
        <button class="btn btn-primary btn-back" onclick="history.back()">Volver Atrás</button>
    </div>
</body>
</html>
