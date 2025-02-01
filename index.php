<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <title>GuiVagas</title>
</head>
<body>
    <button><a href="adcionar-vaga.php" style="text-decoration: none;">Adcionar Vaga</a></button>
    <?php 
    require_once 'includes/sistema.php';
    require_once 'layouts/direitos.php';
    ?>
    <h1>GuiVagas</h1>
    <hr>
    <table>
        <?php 
        $busca = $sistema->query('select * from vagas');
        if (!$busca){
            echo 'Erro';
        } else {
            if ($busca->num_rows == 0){
                echo 'Existe nenhuma vaga no momento';
            } else {
                while ($reg=$busca->fetch_object()){
                    echo "<tr><td><a href='pagina-vaga.php?i=$reg->id'><img src='$reg->imagem'></a></td><td>$reg->nome</td><td><a href='deletar-vaga.php?i=$reg->id'><img src='imgs/delete_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png' width='25'></a></td></tr>";
                }
            }
        }
        ?>
    </table>
    <?php direitos() ?>
    <?php $sistema->close() ?>
</body>
</html>