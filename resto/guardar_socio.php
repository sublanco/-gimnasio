<?php
include "conexion.php";

// Obtener datos del formulario
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];

// Validar DNI repetido
$validar = $conexion->query("SELECT id FROM socios WHERE dni = '$dni'");

if ($validar->num_rows > 0) {
    echo "⚠️ Error: El DNI ya está registrado.<br><br>";
    echo "<a href='agregar_socio.php'>Volver</a>";
    exit();
}


// Manejo de foto
$foto = "";

if(isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {

    $nombreFoto = time() . "_" . $_FILES['foto']['name'];
    $rutaDestino = "fotos/" . $nombreFoto;

    // Crear carpeta si no existe
    if (!file_exists("fotos")) {
        mkdir("fotos", 0777, true);
    }

    // Mover foto a la carpeta
    move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);

    $foto = $nombreFoto;
}

// Guardar en la BD
$sql = "INSERT INTO socios (dni, nombre, foto) 
        VALUES ('$dni', '$nombre', '$foto')";

if ($conexion->query($sql) === TRUE) {
    echo "Socio agregado correctamente<br><br>";
    echo "<a href='socios.php'>Volver al listado</a>";
} else {
    echo "Error: " . $conexion->error;
}
?>
