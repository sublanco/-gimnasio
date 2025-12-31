<?php
require_once '../config/db.php';
require_once '../models/Cliente.php';

$cliente = new Cliente($pdo);
$clientes = $cliente->listarTodos();
if (isset($_GET['msg']) && $_GET['msg'] === 'pago_ok') {
    echo "<p class='success'>Pago registrado correctamente</p>";
}

require_once '../views/listadoClientes.php';


