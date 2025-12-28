<?php

class Clase {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM clases WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function hayCupo($id) {
        $stmt = $this->pdo->prepare(
            "SELECT cupo FROM clases WHERE id = ?"
        );
        $stmt->execute([$id]);
        $clase = $stmt->fetch(PDO::FETCH_ASSOC);

        return $clase && $clase['cupo'] > 0;
    }

    public function ocuparCupo($id) {
        $stmt = $this->pdo->prepare(
            "UPDATE clases SET cupo = cupo - 1 WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }

    public function liberarCupo($id) {
        $stmt = $this->pdo->prepare(
            "UPDATE clases SET cupo = cupo + 1 WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
}
