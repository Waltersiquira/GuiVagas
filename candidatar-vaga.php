<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <title>GuiVagas</title>
</head>
<body style="text-align: center;">
    <?php 
    require_once 'includes/sistema.php';
    require_once 'layouts/direitos.php';
    ?>
    <?php 
    $id = $sistema->real_escape_string($_GET['i'] ?? '');
    if ($sistema->query("UPDATE vagas SET candidatos = candidatos + 1 WHERE id = '$id'")){
        echo "<h1>Candidatado</h1> <img src='https://upload.wikimedia.org/wikipedia/commons/8/84/Approved_img.png' width='400';> <p>Você foi Candidatado para vaga de emprego boa sorte para conseguir seu emprego</p>";
    }
    ?>
    <button><a href="index.php"><img src="imgs/arrow_back_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" width="30"></a></button>
    <?php direitos() ?>
    <?php $sistema->close() ?>
</body>
</html>