<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TRUPER Sistema</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: Arial, sans-serif;
}

.hero {
    height: 100vh;
    background: linear-gradient(135deg, #ff6a00, #ee0979);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.hero-box {
    max-width: 700px;
    padding: 20px;
}

.navbar-brand {
    font-weight: bold;
    letter-spacing: 2px;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
  <div class="container">
    <span class="navbar-brand">TRUPER SYSTEM</span>
    <a href="login.php" class="btn btn-warning">Iniciar Sesión</a>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-box">
    <h1 class="display-4 fw-bold">Sistema de Gestión de Productos</h1>
    <p class="lead mt-3">
      Administra refacciones, herramientas y artículos de forma rápida, segura y organizada.
    </p>
    <a href="login.php" class="btn btn-light btn-lg mt-4 px-4">
      Entrar al sistema
    </a>
  </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3">
    © 2026 TRUPER SYSTEM | Todos los derechos reservados
</footer>

</body>
</html>