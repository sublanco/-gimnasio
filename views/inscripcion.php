<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción de cliente</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="container">
    <h2>Inscripción de cliente</h2>

   <form action="/gimnasio/controllers/inscripcionController.php" method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>DNI</label>
        <input type="text" name="dni" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <button type="submit">Inscribir cliente</button>
    </form>
</div>

</body>
</html>

