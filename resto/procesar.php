<?php
session_start();
include "config.php";

// Bloqueo
if ($_SESSION['intentos'] >= 3) {
    echo "Bloqueado. Intente más tarde.";
    exit();
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

if ($usuario === $USUARIO && $password === $PASSWORD) {
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

