<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

# =========================
# CREAR
# =========================
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];

    $sql = "INSERT INTO Herramientas(nombre, precio, stock)
            VALUES('$nombre','$precio','$stock')";

    if (!$conexion->query($sql)) {
        die("Error INSERT: " . $conexion->error);
    }

    header("Location: admin.php");
    exit();
}

# =========================
# ACTUALIZAR
# =========================
if (isset($_POST['actualizar'])) {
    $id     = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];

    $sql = "UPDATE Herramientas 
            SET nombre='$nombre', precio='$precio', stock='$stock' 
            WHERE id=$id";

    if (!$conexion->query($sql)) {
        die("Error UPDATE: " . $conexion->error);
    }

    header("Location: admin.php");
    exit();
}

# =========================
# ELIMINAR
# =========================
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);

    $sql = "DELETE FROM Herramientas WHERE id=$id";

    if (!$conexion->query($sql)) {
        die("Error DELETE: " . $conexion->error);
    }

    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">Panel de Productos Truper</h2>

    <a href="logout.php" class="btn btn-danger mb-3">Cerrar sesión</a>

    <!-- BOTÓN AGREGAR -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregar">
        + Agregar producto
    </button>

    <!-- TABLA -->
    <table class="table table-striped table-hover shadow">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $sql = "SELECT * FROM Herramientas ORDER BY id DESC";
        $resultado = $conexion->query($sql);

        if (!$resultado) {
            die("Error SELECT: " . $conexion->error);
        }

        while ($row = $resultado->fetch_assoc()) {

            # MODO EDICIÓN
            if (isset($_GET['editar']) && $_GET['editar'] == $row['id']) {
                echo "
                <tr>
                    <form method='POST'>
                        <td>
                            {$row['id']}
                            <input type='hidden' name='id' value='{$row['id']}'>
                        </td>

                        <td>
                            <input class='form-control' type='text' name='nombre' value='{$row['nombre']}'>
                        </td>

                        <td>
                            <input class='form-control' type='text' name='precio' value='{$row['precio']}'>
                        </td>

                        <td>
                            <input class='form-control' type='number' name='stock' value='{$row['stock']}'>
                        </td>

                        <td>
                            <button class='btn btn-success btn-sm' name='actualizar'>Guardar</button>
                            <a class='btn btn-secondary btn-sm' href='admin.php'>Cancelar</a>
                        </td>
                    </form>
                </tr>
                ";
            } else {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['precio']}</td>
                    <td>{$row['stock']}</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='?editar={$row['id']}'>Editar</a>
                        <a class='btn btn-danger btn-sm' 
                           href='?eliminar={$row['id']}' 
                           onclick=\"return confirm('¿Seguro que quieres eliminar?')\">
                           Eliminar
                        </a>
                    </td>
                </tr>
                ";
            }
        }
        ?>
        </tbody>
    </table>
</div>

<!-- MODAL AGREGAR -->
<div class="modal fade" id="modalAgregar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input class="form-control mb-2" type="text" name="nombre" placeholder="Nombre" required>
                    <input class="form-control mb-2" type="text" name="precio" placeholder="Precio" required>
                    <input class="form-control mb-2" type="number" name="stock" placeholder="Stock" required>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="guardar" class="btn btn-success">
                        Guardar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
