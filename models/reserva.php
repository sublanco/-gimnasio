<?php

class Reserva {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function crear($clienteId, $claseId) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO reservas (cliente_id, clase_id, estado)
             VALUES (?, ?, 'ACTIVA')"
        );
        return $stmt->execute([$clienteId, $claseId]);
    }

    public function existe($reservaId) {
        $stmt = $this->pdo->prepare(
            "SELECT id FROM reservas WHERE id = ?"
        );
        $stmt->execute([$reservaId]);
        return $stmt->fetch() !== false;
    }

    public function cancelar($reservaId) {
        $stmt = $this->pdo->prepare(
            "UPDATE reservas SET estado = 'CANCELADA'
             WHERE id = ?"
        );
        return $stmt->execute([$reservaId]);
    }
}
