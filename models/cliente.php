<?php

class Cliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM clientes WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function estaActivo($id) {
        $stmt = $this->pdo->prepare(
            "SELECT activo FROM clientes WHERE id = ?"
        );
        $stmt->execute([$id]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente && $cliente['activo'];
    }
}
