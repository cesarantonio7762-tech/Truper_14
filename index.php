<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUPER Sistema</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
        }

        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #ff6a00, #ee0979);
            color: white;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            color: #000;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
        <span class="navbar-brand fw-bold">TRUPER</span>
        <a href="login.php" class="btn btn-warning fw-bold">LOGIN</a>
    </div>
</nav>

<!-- HERO -->
<section class="hero d-flex align-items-center">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Sistema de Gestión de Productos</h1>
        <p class="lead">Administra refacciones, herramientas y artículos fácilmente</p>
        <a href="login.php" class="btn btn-light btn-lg mt-3 fw-bold">
            Entrar al sistema
        </a>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3">
    © 2026 TRUPER | Proyecto Escolar
</footer>

</body>
</html>