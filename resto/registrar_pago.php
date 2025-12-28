<?php
include 'conexion.php';

$id = $_GET['id']; // ID del socio
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Pago</title>

    <style>
        body{
            font-family: Arial;
            background: #f4f4f4;
            padding: 40px;
        }
        .form{
            background: white;
            padding: 25px;
            width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2{text-align:center;}
        label{font-weight: bold;}
        input, select{
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
        }
        button{
            width: 100%;
            padding: 10px;
            border: none;
            background: green;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

</head>
<body>

<div class="form">
    <h2>Registrar Pago</h2>

    <form action="guardar_pago.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="socio_id" value="<?php echo $id; ?>">

        <label>Fecha del Pago:</label>
        <input type="date" name="fecha" required>

        <label>Monto:</label>
        <input type="number" step="0.01" name="monto" required>

        <label>Método de Pago:</label>
        <select name="metodo" required>
            <option>Efectivo</option>
            <option>Transferencia</option>
            <option>Tarjeta</option>
        </select>

        <label>Comprobante (opcional):</label>
        <input type="file" name="comprobante">

        <button type="submit">Guardar Pago</button>
    </form>
</div>

</body>
</html>
