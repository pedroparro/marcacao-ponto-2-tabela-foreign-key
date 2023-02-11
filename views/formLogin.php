
        <!--RIGHT-->
        <div class="div-right">
            <form class="form-right" action="controllers/PortalControllers.php" method="post">
            <input type="hidden" name="users_adm_ponto">
                <input type="text" class="input-right" name="users_ponto" id="" placeholder="Usuário">
                <input type="text" class="input-right" name="pass_adm_ponto" id="" placeholder="Senha">

                <button type="submit" id="btn-login">Entrar no portal</button>

                <?php if(isset($_GET['l'])){ ?>
                    <p id="alert-erro"><a href="index.php"><i class="fa fa-arrow-left"></i></a>
                <?php echo $_GET['l']; ?>
                    </p>
                <?php } ?>
            </form>
        </div>