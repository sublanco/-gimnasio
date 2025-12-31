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
        $Membresia = $stmt->fetch(PDO::FETCH_ASSOC);
        $Membresia =$declaracion->buscar(PDO::FETCH_ASSOC);


        return!$Membresia|| !$Membresia['vigente'];
    }



    public function actualizarVigencia($cliente_id) {
        $stmt = $this->pdo->prepare(
            "UPDATE membresias
             SET fecha_inicio = CURDATE(),
                 fecha_fin = DATE_ADD(CURDATE(), INTERVAL 30 DAY)
             WHERE cliente_id = ?"
        );
        return $stmt->execute([$cliente_id]);
    }
}
