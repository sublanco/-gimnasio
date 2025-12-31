<?php
require_once "../config/db.php";
require_once '../models/Cliente.php';
require_once '../models/Pago.php';
require_once '../models/Membresia.php';

$clienteModel = new Cliente($pdo);
$pagoModel = new Pago($pdo);
$membresiaModel = new Membresia($pdo);


// Datos del formulario
//$clienteId = $_GET['cliente_id'];
//$monto     = $_GET['monto'];
//$metodo    = $_GET['metodo'];


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Mostrar formulario
    if (!isset($_GET['cliente_id'])) {
        die('Cliente no especificado');
    }

    $cliente = $clienteModel->obtenerPorId($_GET['cliente_id']);
    require '../views/pago.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = $_POST['cliente_id'];
    $monto = $_POST['monto'];
    $metodo = $_POST['metodo'];

    $pagoOk = $pagoModel->registrar($cliente_id, $monto, $metodo);

    if ($pagoOk) {
        $membresiaModel->actualizarVigencia($cliente_id);
        header('Location: ../controllers/clienteController.php?msg=pago_ok');
    } else {
        echo "Error al registrar el pago";
    }
}
