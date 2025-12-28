<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago de membresía</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="container">
    <h2>Pago de cuota / membresía</h2>

    <form action="../controllers/pagoController.php" method="POST">
        <label>ID Cliente</label>
        <input type="hidden" name="cliente_id" value="<?= $_GET['cliente_id'] ?? '' ?>">

      

        <label>Monto</label>
        <input type="number" name="monto" required>

        <label>Método de pago</label>
        <select name="metodo" required>
            <option value="">Seleccione</option>
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
            <option value="transferencia">Transferencia</option>
        </select>

        <button type="submit">Registrar pago</button>
    </form>
</div>

</body>
</html>
