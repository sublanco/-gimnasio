<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago de membresía</title>
</head>
<body>

<h2>Pago de cuota / membresía</h2>

<form action="../controllers/pagoController.php" method="POST">
    <label>ID Cliente:</label><br>
    <input type="number" name="cliente_id" required><br><br>

    <label>Monto:</label><br>
    <input type="number" name="monto" required><br><br>

    <label>Método de pago:</label><br>
    <select name="metodo" required>
        <option value="">Seleccione</option>
        <option value="efectivo">Efectivo</option>
        <option value="tarjeta">Tarjeta</option>
        <option value="transferencia">Transferencia</option>
    </select><br><br>

    <button type="submit">Registrar pago</button>
</form>

</body>
</html>
