<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferraz Veras</title>
    <link rel="stylesheet" href="../public/css/ponto.css">
    <link rel="stylesheet" href= https://use.fontawesome.com/releases/v6.2.1/css/all.css>
</head>
<body>
    <div class="div-table">
        <h2 id="h2-ponto">CONTROLE DE PONTO 2023</h2>
        <table id="table-ponto">
            <thead id="thead-ponto">
                <tr>
                    <th class="th-ponto">USUÁRIO</th>
                    <th>NOME</th>
                    <th>DATA E HORA</th>
                    <th>REGISTRO</th>
                </tr>
            </thead>
            <tbody id="tbody-ponto">
                <?php 
                include("../vendor/autoload.php");
                use \Models\Portal;

                $obj = new Portal();
                $row = $obj->selectTablePortalDb();
                
                foreach ($row as $value) {
                    
                ?>
                <tr>
                    <th><?php echo $value['users_adm_ponto']; ?></th>
                    <th><?php echo $value['users_ponto']; ?></th>
                    <th><?php echo $value['data_hora_ponto']; ?></th>
                    <th><?php echo $value['register_ponto']; ?></th>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  
</body>
</html>
    