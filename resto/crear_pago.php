<?php
include 'conexion.php';

$socio_id = $_POST['socio_id'];
$fecha = $_POST['fecha'];
$monto = $_POST['monto'];
$metodo = $_POST['metodo'];

// Subir comprobante (opcional)
$comprobante = null;
if (!empty($_FILES["comprobante"]["name"])) {
    $archivo = "comprobantes/" . basename($_FILES["comprobante"]["name"]);
    move_uploaded_file($_FILES["comprobante"]["tmp_name"], $archivo);
    $comprobante = $archivo;
}

$sql = "INSERT INTO pagos (socio_id, fecha, monto, metodo, comprobante)
        VALUES ('$socio_id', '$fecha', '$monto', '$metodo', '$comprobante')";

if ($conn->query($sql) === TRUE) {
    header("Location: pagos.php?id=$socio_id");
} else {
    echo "Error: " . $conn->error;
}

?>
