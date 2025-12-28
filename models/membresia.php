<?php

class Membresia {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function estaVencida($clienteId) {
        $stmt = $this->pdo->prepare(
            "SELECT vigente FROM membresias WHERE cliente_id = ?"
        );
        $stmt->execute([$clienteId]);
        $membresia = $stmt->fetch(PDO::FETCH_ASSOC);

        return !$membresia || !$membresia['vigente'];
    }

    public function actualizarVigencia($clienteId) {
        $stmt = $this->pdo->prepare(
            "UPDATE membresias SET vigente = 1
             WHERE cliente_id = ?"
        );
        return $stmt->execute([$clienteId]);
    }
}
