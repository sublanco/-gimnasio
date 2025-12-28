<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

// Obtener socios
$sql = "SELECT * FROM socios";
$result = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Socios Registrados</title>
<link rel="stylesheet" href="estilos.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    a.btn {
        display: inline-block;
        background: #28a745;
        color: white;
        padding: 10px 18px;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 15px;
        font-weight: bold;
    }
    a.btn:hover { background: #218838; }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
    }

    th {
        background: #007bff;
        color: white;
        padding: 12px;
        text-align: left;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f1f1f1;
    }

    .btn-accion {
        padding: 6px 12px;
        color: white;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
    }

    .editar { background: #ffc107; }
    .editar:hover { background: #e0a800; }

    .eliminar { background: #dc3545; }
    .eliminar:hover { background: #c82333; }

    .pagos { background: #17a2b8; }
    .pagos:hover { background: #117a8b; }

    img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>

</head>

<body>
    
<div class="contenedor">
<div>
    <?php include ("menu.php"); ?>
</div>
<div>
<div>
    <h2>Gestionar Socios</h2>
</div>
<a href="agregar_socio.php" class="btn">+ Agregar Nuevo Socio</a>

<table>
    <tr>
        <th>ID</th>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Foto</th>
        <th>Acciones</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['dni'] ?></td>
            <td><?= $row['nombre'] ?></td>

            <td>
                <?php if ($row['foto']) { ?>
                    <img src="fotos/<?= $row['foto'] ?>">
                <?php } else { echo "Sin foto"; } ?>
            </td>

            <td>
                <a class="btn-accion editar" href="editar_socio.php?id=<?= $row['id'] ?>">Editar</a>
                <a class="btn-accion eliminar" href="eliminar_socio.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar socio?')">Eliminar</a>
                <a class="btn-accion pagos" href="pagos.php?id=<?= $row['id'] ?>">Pagos</a>
            </td>
        </tr>
    <?php } ?>

</table>
</div>
</body>
</html>
