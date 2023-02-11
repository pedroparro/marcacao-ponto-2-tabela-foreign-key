<?php
namespace Models;

class Portal extends Config
{
    //INSERT
    public function insertDb($user,$register)
    {
        try {
            $query = "INSERT INTO ponto (users_ponto,register_ponto) VALUES (:users_ponto,:register_ponto)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":users_ponto",trim($user));
            $stmt->bindValue(":register_ponto",trim($register));
            $stmt->execute();
            return $stmt;
        } catch (\Exception $e) {
            die("Erro insert..." . $e->getMessage());
        }
    }

    //SELECT TABLE
    public function selectTablePortalDb()
    {
        try {         
            if ($_SESSION['users_ponto'] === $_SESSION['users_adm_ponto']) {
            $users_ponto = $_SESSION['users_ponto'];
            $users_adm_ponto = $_SESSION['users_adm_ponto'];

            $query = "SELECT * FROM ponto INNER JOIN adm_ponto WHERE users_ponto = :users_ponto AND users_adm_ponto = :users_adm_ponto";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":users_ponto", $users_ponto);
            $stmt->bindValue(":users_adm_ponto", $users_adm_ponto);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            return $result;               
         }
           
        } catch (\Exception $e) {
            die("Erro selectTablePortalDb..." . $e->getMessage());
        }
    }

    //SELECT SESSION
    public function selectPortalSession($users_adm_ponto,$users_ponto)
    {
        try {
            $query = "SELECT * FROM ponto INNER JOIN adm_ponto WHERE users_ponto = users_adm_ponto";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":users_adm_ponto",trim($users_adm_ponto));
            $stmt->bindValue(":users_ponto",trim($users_ponto));
            $stmt->execute();
            $stmt->rowCount() > 0; 
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            die("Erro selectPortalSession..." . $e->getMessage());
        }
    }

     //SELECT 
     public function selectPortalDb($users_ponto,$pass_adm_ponto,$users_adm_ponto)
     {
         try {
             $query = "SELECT * FROM ponto INNER JOIN adm_ponto WHERE users_ponto=:users_ponto AND pass_adm_ponto=:pass_adm_ponto AND users_adm_ponto=:users_adm_ponto";
             $stmt = $this->pdo->prepare($query);
             $stmt->bindValue(":users_adm_ponto",trim($users_adm_ponto));
             $stmt->bindValue(":users_ponto",trim($users_ponto));
             $stmt->bindValue(":pass_adm_ponto",trim($pass_adm_ponto));
             $stmt->execute();
             $stmt->rowCount() > 0; 
             return $stmt->fetch(\PDO::FETCH_ASSOC);
         } catch (\Exception $e) {
             die("Erro selectPortalDb..." . $e->getMessage());
         }
     }
    
}
?>