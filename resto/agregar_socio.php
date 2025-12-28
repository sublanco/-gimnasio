<!DOCTYPE html>
<html>
<head>
    <title>Agregar Socio</title>
</head>
<script>
function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
}
</script>

<body>
<button class="dark-toggle" onclick="toggleDarkMode()">🌓 Modo Oscuro</button>

<h2>Agregar Socio</h2>

<form action="guardar_socio.php" method="POST" enctype="multipart/form-data">

    <label>DNI:</label><br>
    <input type="text" name="dni" required><br><br>

    <label>Nombre completo:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Foto (opcional):</label><br>
    <input type="file" name="foto"><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="socios.php">Volver al listado</a>

</body>
</html>
