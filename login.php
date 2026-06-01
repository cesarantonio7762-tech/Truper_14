<?php
session_start();

if ($_POST) {
    $correo = $_POST['correo'];
    $pass = $_POST['password'];

    if (strpos($correo, "@itoaxaca.edu.mx") !== false) {

        $numControl = substr($correo, 0, 8);

        if ($pass === $numControl . "tso") {
            $_SESSION['usuario'] = $correo;
            header("Location: admin.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }

    } else {
        $error = "Debes usar un correo institucional";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>inicio de sesion</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #667eea, #764ba2);
}
.card {
    border-radius: 15px;
}
</style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 350px;">
    <h3 class="text-center mb-3">Inicio De Sesion</h3>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
        <input class="form-control mb-3" type="email" name="correo" placeholder="Correo institucional" required>

        <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña (No.Control + tso)" required>

        <button class="btn btn-primary w-100">Entrar</button>
    </form>
</div>

</body>
</html>
