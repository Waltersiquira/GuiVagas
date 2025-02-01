<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <title>GuiVagas</title>
</head>
<body>
    <?php 
    require_once 'includes/sistema.php';
    require_once 'layouts/direitos.php';
    ?>
    <?php 
    $id = $sistema->real_escape_string($_GET['i'] ?? '');
    $busca = $sistema->query("select * from vagas where id = '$id'");
    if (!$busca){
        echo 'Erro <br>';
    } else {
        if ($busca->num_rows == 0){
            echo 'Existe nenhuma vaga dessa no momento <br>';
        } else {
            while ($reg=$busca->fetch_object()){
                echo "<img src='$reg->imagem' width='300'> <h1>$reg->nome</h1> Candidatos: $reg->candidatos <br> Localização: $reg->localização <hr> <p>$reg->descrição</p> <button style='background-color: blue;'><a href='candidatar-vaga.php?i=$reg->id' style='color: white; text-decoration: none;'>Candidatar a Vaga</a></button> <br>";
            }
        }
    }
    ?>
    <button><a href="index.php"><img src="imgs/arrow_back_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" width="30"></a></button> <br>
    <?php direitos() ?>
    <?php $sistema->close() ?>
</body>
</html>