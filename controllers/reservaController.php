<?php
require_once "../config/db.php";
require_once "../models/Cliente.php";
require_once "../models/Clase.php";
require_once "../models/Reserva.php";

// Instanciar modelos
$clienteModel = new Cliente($pdo);
$claseModel   = new Clase($pdo);
$reservaModel = new Reserva($pdo);

// Datos del formulario
$clienteId = $_POST['cliente_id'];
$claseId   = $_POST['clase_id'];

// 1️⃣ Verificar que el cliente esté activo
if (!$clienteModel->estaActivo($clienteId)) {
    die("Error: el cliente no está activo");
}

// 2️⃣ Verificar que la clase tenga cupo
if (!$claseModel->hayCupo($claseId)) {
    die("Error: no hay cupo disponible");
}

// 3️⃣ Crear la reserva
if (!$reservaModel->crear($clienteId, $claseId)) {
    die("Error al crear la reserva");
}

// 4️⃣ Ocupar cupo
$claseModel->ocuparCupo($claseId);

// 5️⃣ Confirmación
echo "Reserva realizada correctamente";
