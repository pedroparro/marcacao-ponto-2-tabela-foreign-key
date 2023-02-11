<?php 
namespace Controllers;
include("../vendor/autoload.php");
use \Models\Ponto;

class InsertControllers
{
    public function insertControllers()
    {
        //EMPTY
        if(empty($_POST['users_adm_ponto'] || $_POST['pass_adm_ponto'] || $_POST['register_ponto'])){
            header("location: ../index.php?e=Preenchimento obrigatório.");
            exit;
        }
        
        //ISSET
        if (isset($_POST['users_adm_ponto'],$_POST['pass_adm_ponto'])) {
            $users_adm_ponto = strip_tags($_POST['users_adm_ponto']);
            $pass_adm_ponto = strip_tags($_POST['pass_adm_ponto']);
                       
            $obj = new Ponto();
            $rows = $obj->selectDb($users_adm_ponto,$pass_adm_ponto);

            //EMPTY
            if($rows['users_adm_ponto'] !== $users_adm_ponto && $rows['pass_adm_ponto'] !== $pass_adm_ponto){
                header("location: ../index.php?e=Dados inválidos.");
                exit;
            }
            if ($rows['users_adm_ponto'] === $users_adm_ponto && $rows['pass_adm_ponto'] === $pass_adm_ponto) {
              
                if (isset($_POST['users_adm_ponto'],$_POST['register_ponto'])) {
                    $users_adm_ponto = strip_tags($_POST['users_adm_ponto']);
                    $register = strip_tags($_POST['register_ponto']);
                    
                $obj = new Ponto();
                $obj->insertDb($users_adm_ponto,$register);

                header("location: ../index.php?s=Marcação realizada com sucesso.");
                exit;
                }else{
                    header("location: ../index.php");
                    exit;
                }
                
            }else{
                header("location: ../index.php");
                exit;
            }
        }else{
            header("location: ../index.php");
            exit;
        }
    }

}
  
$i = new InsertControllers();
$i->insertControllers();
?>