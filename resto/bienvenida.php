<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<div class="contenedor">
    <?php include ("menu.php"); ?>
</div>

</body>
</html>
