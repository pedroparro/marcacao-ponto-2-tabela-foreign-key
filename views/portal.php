<?php 
session_start();
if (!$_SESSION['users'] && !$_SESSION['users_adm_ponto']) {
    header("location: ../index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORTAL</title>
    <link rel="stylesheet" href="../public/css/portal.css">
</head>
<body>
    <div class="row">
        <div class="nav">
            <h3><a href="index.html">PORTAL</a></h3><hr><a href="../logout.php" id="a-voltar-portal">SAIR</a><br>
            <p id="p-bemvindo">Bem-vindo |</p> <?php echo $_SESSION['users_adm_ponto']; ?>
            <ul>
                <li><a href="portal.php">HOME</a></li>
                <hr></hr>
                <li><a href="portal.php">PONTO</a></li>
                <hr></hr>
            </ul>
        </div>
        <?php include "./ponto.php"; ?>
    </div>
    
    <footer>
        <p>Desenvolvido por <span>Pedro Parro - 2023</span></p>
    </footer>
</body>
</html>