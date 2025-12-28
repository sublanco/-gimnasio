<?php
session_start();
require 'config.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <title>Pagos</title>
</head>

<body>

<?php include 'menu.php'; ?>

<div class="contenedor">
    <h2>Gestión de Pagos</h2>

    <form method="GET" class="formulario">
        <label>DNI del socio:</label>
        <input type="text" name="dni" required>
        <button type="submit">Buscar</button>
    </form>

    <?php
    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];

        $stmt = $conn->prepare("SELECT * FROM socios WHERE dni = ?");
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 0) {
            echo "<p class='alerta alerta-error'>No se encontró un socio con ese DNI.</p>";
        } else {
            $socio = $resultado->fetch_assoc();
            echo "<h3>Socio: " . $socio['nombre'] . " " . $socio['apellido'] . "</h3>";
            echo "<a class='boton' href='crear_pago.php?id=" . $socio['id'] . "'>Registrar Pago</a>";

            // Mostrar historial de pagos
            $stmtPagos = $conn->prepare("SELECT * FROM pagos WHERE socio_id = ? ORDER BY fecha DESC");
            $stmtPagos->bind_param("i", $socio['id']);
            $stmtPagos->execute();
            $pagos = $stmtPagos->get_result();

            if ($pagos->num_rows > 0) {
                echo "<table class='tabla'>
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Método</th>
                            <th>Acciones</th>
                        </tr>";

                while ($pago = $pagos->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $pago['fecha'] . "</td>
                            <td>$" . $pago['monto'] . "</td>
                            <td>" . $pago['metodo'] . "</td>
                            <td>
                                <a class='boton-chico' href='comprobante.php?id=" . $pago['id'] . "'>Ver</a>
                            </td>
                          </tr>";
                }

                echo "</table>";
            } else {
                echo "<p class='alerta'>Este socio aún no tiene pagos registrados.</p>";
            }
        }
    }
    ?>

</div>

</body>
</html>

