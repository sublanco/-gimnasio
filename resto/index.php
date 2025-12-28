<!DOCTYPE html>
<?php
session_start();

// Reinicia contador si viene del logout
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
    <title>Login</title>
</head>

<body>

<div class="contenedor">
    <h2>Login</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<p class='error'>Usuario o contraseña incorrectos</p>";
    }

    if ($_SESSION['intentos'] >= 3) {
        echo "<p class='error'>Demasiados intentos, espere 30 segundos...</p>";
        exit();
    }
    ?>

    <form action="procesar.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Ingresar</button>
    </form>
</div>

</body>
</html>

