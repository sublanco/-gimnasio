<?php

class Cliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function crear($nombre, $dni, $email) {
        $sql = "INSERT INTO clientes (nombre, dni, email, activo)
                VALUES (:nombre, :dni, :email, 1)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nombre' => $nombre,
            ':dni'    => $dni,
            ':email'  => $email
        ]);
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

    public function listarTodos() {
    $sql = "SELECT * FROM clientes ORDER BY id DESC";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getUltimoId() {
    return $this->pdo->lastInsertId();
}


}

