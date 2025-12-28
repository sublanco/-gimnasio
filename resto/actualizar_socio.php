<?php
include "conexion.php";

$id = $_POST['id'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];

// Validar DNI repetido (excepto el del mismo socio)
$validar = $conexion->query("
    SELECT id 
    FROM socios 
    WHERE dni = '$dni' AND id != $id
");

if ($validar->num_rows > 0) {
    echo "⚠️ Error: Ya existe otro socio con este DNI.<br><br>";
    echo "<a href='editar_socio.php?id=$id'>Volver</a>";
    exit();
}

// Buscar la foto actual
$sqlFoto = "SELECT foto FROM socios WHERE id = $id";
$res = $conexion->query($sqlFoto);
$fotoActual = $res->fetch_assoc()['foto'];

$fotoNueva = $fotoActual;

// Si subieron una nueva foto
if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {

    // Borrar foto anterior
    if ($fotoActual != "" && file_exists("fotos/" . $fotoActual)) {
        unlink("fotos/" . $fotoActual);
    }

    $nombreFoto = time() . "_" . $_FILES['foto']['name'];
    $ruta = "fotos/" . $nombreFoto;

    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

    $fotoNueva = $nombreFoto;
}

// Actualizar datos
$sql = "UPDATE socios SET 
        dni = '$dni', 
        nombre = '$nombre',
        foto = '$fotoNueva'
        WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: socios.php");
} else {
    echo "Error al actualizar: " . $conexion->error;
}
?>
