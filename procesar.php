<?php
session_start();

// Bloqueo
if ($_SESSION['intentos'] >= 3) {
    echo "Bloqueado. Intente más tarde.";
    exit();
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

if ($usuario === 'susi' && $password === '123') {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['intentos'] = 0; // reset
    header("Location: bienvenida.php");
    exit();
} else {
    $_SESSION['intentos']++;
    header("Location: index.php?error=1");
    exit();
}
?>

