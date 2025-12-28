<?php
include "conexion.php";

$id = $_GET['id'];

// Datos del socio
$sqlSocio = "SELECT * FROM socios WHERE id = $id";
$socio = $conexion->query($sqlSocio)->fetch_assoc();

// Pagos del socio
$sqlPagos = "SELECT * FROM pagos WHERE socio_id = $id ORDER BY fecha DESC";
$pagos = $conexion->query($sqlPagos);
?>

<h2>Historial de Pagos</h2>

<h3><?= $socio['nombre'] ?> (DNI: <?= $socio['dni'] ?>)</h3>

<a href="nuevo_pago.php?socio_id=<?= $id ?>">Registrar nuevo pago</a>
<br><br>

<table border="1">
    <tr>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Tipo de Pago</th>
        <th>Comprobante</th>
    </tr>

    <?php while($p = $pagos->fetch_assoc()) { ?>
    <tr>
        <td><?= $p['fecha'] ?></td>
        <td>$<?= $p['monto'] ?></td>
        <td><?= ucfirst($p['tipo_pago']) ?></td>
        <td>
            <?php if ($p['comprobante']) { ?>
                <a href="comprobantes/<?= $p['comprobante'] ?>" target="_blank">Ver</a>
            <?php } else { ?>
                -
            <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="socios.php">Volver a Socios</a>
