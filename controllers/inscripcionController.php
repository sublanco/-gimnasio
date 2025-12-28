<?php
require_once "../config/db.php";
require_once "../models/Cliente.php";

// Validar que venga por POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acceso no permitido");
}

$nombre = $_POST['nombre'] ?? null;
$dni    = $_POST['dni'] ?? null;
$email  = $_POST['email'] ?? null;

// Validación básica
if (!$nombre || !$dni || !$email) {
    die("Error: datos incompletos");
}

$clienteModel = new Cliente($pdo);

// Crear cliente
if ($clienteModel->crear($nombre, $dni, $email)) {
   // echo "Cliente inscripto correctamente";
   //header("Location: ../views/pago.php?cliente_id=" . $clienteModel->getUltimoId());
   header("Location: clienteController.php");
   exit;
} else {
    echo "Error al inscribir el cliente";
}
