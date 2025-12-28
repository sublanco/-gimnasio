<?php
require_once '../config/db.php';
require_once '../models/Cliente.php';

$cliente = new Cliente($pdo);
$clientes = $cliente->listarTodos();

require_once '../views/listadoClientes.php';
