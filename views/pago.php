<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago de Membresía</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="card">
    <h2>Pago de Membresía</h2>

    <form method="POST" action="../controllers/pagoController.php">

        <input type="hidden" name="cliente_id" value="<?= $cliente['id'] ?>">

        <p><strong>Cliente:</strong> <?= $cliente['nombre'] ?></p>
        <p><strong>Email:</strong> <?= $cliente['email'] ?></p>

        <label>Monto</label>
        <input type="number" name="monto" required>

        <label>Método de pago</label>
        <select name="metodo" required>
            <option value="efectivo">Efectivo</option>
            <option value="tarjeta">Tarjeta</option>
            <option value="transferencia">Transferencia</option>
        </select>

        <button type="submit" class="btn btn-primary">
            Confirmar Pago
        </button>
    </form>
</div>

</body>
</html>
