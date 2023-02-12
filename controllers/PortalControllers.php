<?php 
namespace Controllers;
include("../vendor/autoload.php");
use \Models\Portal;


class PortalControllers
{
    public function portalControllers()
    {
        //EMPTY
        if(empty(trim($_POST['users_ponto']) && trim($_POST['pass_adm_ponto']))){
            header("location: ../index.php?l=Preenchimento obrigatório.");
            exit;
        }

        //ISSET
        if (isset($_POST['users_ponto'],$_POST['users_adm_ponto'],$_POST['pass_adm_ponto'])) {
            $users_ponto = strip_tags(filter_var($_POST['users_ponto'], FILTER_SANITIZE_SPECIAL_CHARS));
            $users_adm_ponto = strip_tags(filter_var($_POST['users_adm_ponto'], FILTER_SANITIZE_SPECIAL_CHARS)).str_repeat($users_ponto,1);
            $pass_adm_ponto = strip_tags(filter_var($_POST['pass_adm_ponto'], FILTER_SANITIZE_SPECIAL_CHARS));
           
            $obj = new Portal();
            $rows = $obj->selectPortalDb($users_ponto,$pass_adm_ponto,$users_adm_ponto);

            //EMPTY
            if($rows['users_ponto'] !== $users_ponto && $rows['pass_adm_ponto'] !== $pass_adm_ponto){
                header("location: ../index.php?l=Dados inválidos.");
                exit;
            }
            if ($rows['users_ponto'] === $users_ponto) {
              
              if ($rows['pass_adm_ponto'] === $pass_adm_ponto) {

                //SESSION
                session_start();
                $_SESSION['users'] = true;
                $_SESSION['users_adm_ponto'] = $rows['users_adm_ponto'];
                $_SESSION['users_ponto'] = $rows['users_ponto'];

                header("location: ../views/portal.php");
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
  
$i = new PortalControllers();
$i->portalControllers();
?>