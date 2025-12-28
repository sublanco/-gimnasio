<?php
require_once "../config/db.php";
require_once "../models/Reserva.php";
require_once "../models/Clase.php";

// Instanciar modelos
$reservaModel = new Reserva($pdo);
$claseModel   = new Clase($pdo);

// Datos del formulario
$reservaId = $_POST['reserva_id'];
$claseId   = $_POST['clase_id'];

// 1️⃣ Verificar que la reserva exista
if (!$reservaModel->existe($reservaId)) {
    die("Error: la reserva no existe");
}

// 2️⃣ Cancelar la reserva
if (!$reservaModel->cancelar($reservaId)) {
    die("Error al cancelar la reserva");
}

// 3️⃣ Liberar cupo de la clase
$claseModel->liberarCupo($claseId);

// 4️⃣ Confirmación
echo "Reserva cancelada correctamente";
