<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<script>
function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
}
</script>

<body>
<button class="dark-toggle" onclick="toggleDarkMode()">🌓 Modo Oscuro</button>

<h2>Login del Sistema</h2>
<form method="POST" action="validar.php">
    <label>Usuario:</label><br>
    <input type="text" name="usuario"><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Ingresar</button>
</form>

</body>
</html>
