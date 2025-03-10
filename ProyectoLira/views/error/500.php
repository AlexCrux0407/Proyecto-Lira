<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500 - Error Interno | <?php echo APP_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-red: #FF0000;
            --primary-yellow: #FFC72C;
            --dark-gray: #333333;
            --white: #FFFFFF;
        }
        body {
            background-color: var(--white);
            font-family: 'Arial', sans-serif;
        }
        .error-container {
            max-width: 800px;
            margin: 100px auto;
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: var(--primary-red);
            margin-bottom: 0;
            line-height: 1;
        }
        .error-message {
            font-size: 24px;
            color: var(--dark-gray);
            margin-bottom: 30px;
        }
        .btn-home {
            background-color: var(--primary-yellow);
            color: var(--dark-gray);
            font-weight: bold;
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn-home:hover {
            background-color: var(--primary-red);
            color: var(--white);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-container">
            <h1 class="error-code">500</h1>
            <p class="error-message">¡Error Interno del Servidor!</p>
            <p>Lo sentimos, ha ocurrido un error inesperado. Estamos trabajando para solucionarlo.</p>
            <a href="<?php echo APP_URL; ?>" class="btn btn-home mt-4">Volver al inicio</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>