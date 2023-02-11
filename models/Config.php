<?php 
namespace Models;

class Config
{
    private $server = "127.0.0.1";
    private $db = "ponto";
    private $user = "root";
    private $pass = "";
    protected $pdo = NULL;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO("mysql:host=$this->server;dbname=$this->db",$this->user,$this->pass);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

            //echo "Conectado com sucesso...";
        } catch (\Exception $e) {
            die("Erro de conexão..." . $e->getMessage());
        }
    }
}
new Config;
?>