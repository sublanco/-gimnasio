<?php
require_once "../config/db.php";
require_once "../models/Cliente.php";
require_once "../models/Membresia.php";
require_once "../models/Pago.php";

// Instanciar modelos
$clienteModel   = new Cliente($pdo);
$membresiaModel = new Membresia($pdo);
$pagoModel      = new Pago($pdo);

// Datos del formulario
$clienteId = $_POST['cliente_id'];
$monto     = $_POST['monto'];
$metodo    = $_POST['metodo'];

// 1️⃣ Verificar que el cliente esté activo
if (!$clienteModel->estaActivo($clienteId)) {
    die("Error: el cliente no está activo");
}

// 2️⃣ Verificar si la membresía está vencida
if (!$membresiaModel->estaVencida($clienteId)) {
    die("La membresía ya se encuentra vigente");
}

// 3️⃣ Registrar el pago
if (!$pagoModel->registrar($clienteId, $monto, $metodo)) {
    die("Error al registrar el pago");
}

// 4️⃣ Validar el pago
if (!$pagoModel->validar()) {
    die("El pago no pudo ser validado");
}

// 5️⃣ Actualizar la vigencia de la membresía
$membresiaModel->actualizarVigencia($clienteId);

// 6️⃣ Confirmación
echo "Pago registrado y membresía actualizada correctamente";
