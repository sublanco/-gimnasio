<!DOCTYPE html>
<html>
<head>
    <title>Clientes inscriptos</title>
    <link rel="stylesheet" href="../assets/estilos.css">
</head>
<body>

<h2>Clientes inscriptos</h2>

<nav>
    <a href="../views/inscripcion.php">Inscripcion</a>
</nav>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Email</th>
        <th>Estado</th>
    </tr>

    <?php foreach ($clientes as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['nombre'] ?></td>
        <td><?= $c['dni'] ?></td>
        <td><?= $c['email'] ?></td>
        <td><?= $c['activo'] ? 'Activo' : 'Inactivo' ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
