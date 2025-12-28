<?php

class Pago {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function registrar($clienteId, $monto, $metodo) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO pagos (cliente_id, monto, metodo, fecha)
             VALUES (?, ?, ?, NOW())"
        );
        return $stmt->execute([$clienteId, $monto, $metodo]);
    }

    public function validar() {
        // En un sistema real acá habría validaciones externas
        return true;
    }
}
