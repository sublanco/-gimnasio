<?php
require_once "../config/db.php";
require_once "../models/Cliente.php";
require_once "../models/Membresia.php";
require_once "../models/Pago.php";

// Instanciar modelos
$clienteModel   = new Cliente($pdo);
$membresiaModel = new Membresia($pdo);
$pagoModel      = new Pago($pdo);

// Datos que vendrían del formulario
$clienteId = $_POST['cliente_id'];
$monto     = $_POST['monto'];    // puede venir vacío si no requiere pago
$metodo    = $_POST['metodo'];   // ej: efectivo, tarjeta

// 1️⃣ Verificar estado del cliente
if (!$clienteModel->estaActivo($clienteId)) {
    die("Error: el cliente no está activo");
}

// 2️⃣ Verificar estado de la membresía
if ($membresiaModel->estaVencida($clienteId)) {

    // 3️⃣ Registrar pago
    if (!$pagoModel->registrar($clienteId, $monto, $metodo)) {
        die("Error al registrar el pago");
    }

    // 4️⃣ Validar pago
    if (!$pagoModel->validar()) {
        die("Pago no válido");
    }

    // 5️⃣ Actualizar membresía
    $membresiaModel->actualizarVigencia($clienteId);
}

// 6️⃣ Confirmar inscripción
echo "Inscripción realizada correctamente";
