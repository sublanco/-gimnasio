
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva de clase</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="container">
    <h2>Reserva de clase</h2>

    <form action="../controllers/reservaController.php" method="POST">
        <label>ID Cliente</label>
        <input type="number" name="cliente_id" required>

        <label>ID Clase</label>
        <input type="number" name="clase_id" required>

        <button type="submit">Reservar</button>
    </form>
</div>

</body>
</html>
