<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva de clase</title>
</head>
<body>

<h2>Reserva de clase</h2>

<form action="../controllers/reservaController.php" method="POST">
    <label>ID Cliente:</label><br>
    <input type="number" name="cliente_id" required><br><br>

    <label>ID Clase:</label><br>
    <input type="number" name="clase_id" required><br><br>

    <button type="submit">Reservar</button>
</form>

</body>
</html>
