<?php
namespace Models;

class Ponto extends Config
{
    //INSERT
    public function insertDb($users_ponto,$register)
    {
        try {
            $query = "INSERT INTO ponto (users_ponto,register_ponto) VALUES (:users_ponto,:register_ponto)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":users_ponto",trim($users_ponto));
            $stmt->bindValue(":register_ponto",trim($register));
            $stmt->execute();
            return $stmt;
        } catch (\Exception $e) {
            die("Erro insert..." . $e->getMessage());
        }
    }

    //SELECT 
    public function selectDb($users_adm_ponto,$pass_adm_ponto)
    {
        try {
            $query = "SELECT * FROM adm_ponto WHERE users_adm_ponto = :users_adm_ponto AND pass_adm_ponto = :pass_adm_ponto";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":users_adm_ponto",trim($users_adm_ponto));
            $stmt->bindValue(":pass_adm_ponto",trim($pass_adm_ponto));
            $stmt->execute();
            $stmt->rowCount() > 0; 
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            die("Erro select..." . $e->getMessage());
        }
    }
}
?>