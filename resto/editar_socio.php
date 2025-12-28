<?php
include "conexion.php";

$id = $_GET['id'];

$sql = "SELECT * FROM socios WHERE id = $id";
$resultado = $conexion->query($sql);
$socio = $resultado->fetch_assoc();
?>

<h2>Editar Socio</h2>

<form action="actualizar_socio.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $socio['id'] ?>">

    <label>DNI:</label><br>
    <input type="text" name="dni" value="<?= $socio['dni'] ?>" required><br><br>

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $socio['nombre'] ?>" required><br><br>

    <label>Foto actual:</label><br>
    <?php if ($socio['foto']) { ?>
        <img src="fotos/<?= $socio['foto'] ?>" width="120"><br><br>
    <?php } else { ?>
        <i>Sin foto</i><br><br>
    <?php } ?>

    <label>Cambiar Foto (opcional):</label><br>
    <input type="file" name="foto"><br><br>

    <button type="submit">Guardar Cambios</button>
</form>

<br>
<a href="socios.php">Volver al listado</a>
