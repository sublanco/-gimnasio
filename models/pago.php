<?php

    class Pago {
        private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function registrar($cliente_id, $monto, $metodo) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO pagos (cliente_id, monto, metodo, fecha)
             VALUES (?, ?, ?, NOW())"
        );
        return $stmt->execute([$cliente_id, $monto, $metodo]);
    }

    public function validar(){
        return True;
    }
}

