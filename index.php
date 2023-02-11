<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcação de Ponto</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href= https://use.fontawesome.com/releases/v6.2.1/css/all.css>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">

</head>
<body>
    <section class="sec-login">
        <h2 id="sec-h2">Bem-vindo ao seu Portal de <span id="sec-span">Ponto Eletrônico</span> </h2>
       
        <!--LEFT-->
        <div class="div-left">
            <form class="form-left" action="controllers/InsertControllers.php" method="post">
                <img src="public/img/timer.jpg" id="logo-ponto" alt="logo-ponto">
                <p id="time"></p>

                <select name="register_ponto" id="" required>
                <?php
                    if (empty($_POST['register_ponto'])):
                        echo '<option value="" disabled selected>Registro de Ponto</option>';
                    endif;
                ?>
                   
                    <option value="entrada">ENTRADA</option>
                    <option value="ida-almoco">IDA/ALMOÇO</option>
                    <option value="volta-almoco">VOLTA/ALMOÇO</option>
                    <option value="saida">SAÍDA</option>
                </select>
                
                <input type="text" class="input-left" name="users_adm_ponto" id="users_adm_ponto" placeholder="Usuário">
                <input type="text" class="input-left" name="pass_adm_ponto" id="pass_adm_ponto" placeholder="Senha">

                <button type="submit" name="submit" id="btn-marcacao">Marcação</button>
                <?php if(isset($_GET['s'])){ ?>
                    <p id="alert-success"><a href="index.php" id="alert-success"><i class="fa fa-arrow-left"></i></a>
                <?php echo $_GET['s']; ?>
                    </p>
                <?php } ?>

                <?php if(isset($_GET['e'])){ ?>
                    <p id="alert-erro"><a href="index.php"><i class="fa fa-arrow-left"></i></a>
                <?php echo $_GET['e']; ?>
                    </p>
                <?php } ?>
              
            </form>
        </div>

       <?php include "views/formLogin.php"; ?>
    </section>
    <footer>
        <p>Desenvolvido por Pedro Parro - 2023</p>
    </footer>
    <script src="public/js/script.js"></script>
</body>
</html>