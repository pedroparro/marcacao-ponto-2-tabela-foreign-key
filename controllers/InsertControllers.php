<?php 
namespace Controllers;
include("../vendor/autoload.php");
use \Models\Ponto;

class InsertControllers
{
    public function insertControllers()
    {
        //EMPTY
        if(empty(trim($_POST['users_adm_ponto']) || trim($_POST['pass_adm_ponto']) || trim($_POST['register_ponto']))){
            header("location: ../index.php?e=Preenchimento obrigatório.");
            exit;
        }
        
        //ISSET
        if (isset($_POST['users_adm_ponto'],$_POST['pass_adm_ponto'])) {
            $users_adm_ponto = strip_tags(filter_var($_POST['users_adm_ponto'], FILTER_SANITIZE_SPECIAL_CHARS));
            $pass_adm_ponto = strip_tags(filter_var($_POST['pass_adm_ponto'], FILTER_SANITIZE_SPECIAL_CHARS));
                       
            $obj = new Ponto();
            $rows = $obj->selectDb($users_adm_ponto,$pass_adm_ponto);

            //EMPTY
            if($rows['users_adm_ponto'] !== $users_adm_ponto && $rows['pass_adm_ponto'] !== $pass_adm_ponto){
                header("location: ../index.php?e=Dados inválidos.");
                exit;
            }
            if ($rows['users_adm_ponto'] === $users_adm_ponto && $rows['pass_adm_ponto'] === $pass_adm_ponto) {
              
                if (isset($_POST['users_adm_ponto'],$_POST['register_ponto'])) {
                    $users_adm_ponto = strip_tags(filter_var($_POST['users_adm_ponto'], FILTER_SANITIZE_SPECIAL_CHARS));
                    $register = strip_tags(filter_var($_POST['register_ponto'], FILTER_SANITIZE_SPECIAL_CHARS));
                    
                $obj = new Ponto();
                $obj->insertDb(trim($users_adm_ponto),trim($register));

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