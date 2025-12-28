<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción de cliente</title>
</head>
<body>

<h2>Inscripción de cliente</h2>

<form action="../controllers/inscripcionController.php" method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>DNI:</label><br>
    <input type="text" name="dni" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Inscribir cliente</button>
</form>

</body>
</html>
