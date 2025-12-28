<!DOCTYPE html>
<html>
<head>
    <title>Clientes inscriptos</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="contenedor">
<h2>Clientes inscriptos</h2>

<a href="../views/inscripcion.php" class='btn'>Inscripcion</a>

<table class="listado">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Email</th>
        <th>Estado</th>
        <th>Acción</th>
    </tr>

    <?php foreach ($clientes as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['nombre'] ?></td>
        <td><?= $c['dni'] ?></td>
        <td><?= $c['email'] ?></td>
        <td><?= $c['activo'] ? 'Activo' : 'Inactivo' ?></td>
        <td>
            <?php if ($c['activo']): ?>
                <a class="btn" href="../views/pago.php?cliente_id=<?= $c['id'] ?>">
                    Pagar
                </a>
            <?php else: ?>
                —
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    
</table>
            </div>
</body>
</html>

