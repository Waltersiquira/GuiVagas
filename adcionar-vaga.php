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
    require_once 'includes/funcoes-seguranca.php';
    require_once 'layouts/direitos.php';
    ?>
    <form method="get">
        digite o nome da vaga <br>
        <input type="text" name="nome" required> <br>
        digite a descrição da vaga <br>
        <textarea name="descrição" required></textarea> <br>
        digite a localização da empresa da vaga <br>
        <input type="text" name="localização" required> <br>
        digite a url da imagem da empresa da vaga <br>
        <input type="url" name="imagem"> <br>
        <input type="submit">
    </form>
    <?php 
    $nome = proteger_contra_xss_e_sql_injection($_GET['nome'] ?? '');
    $descrição = proteger_contra_xss_e_sql_injection($_GET['descrição'] ?? '');
    $localização = proteger_contra_xss_e_sql_injection($_GET['localização'] ?? '');
    $imagem = proteger_contra_xss_e_sql_injection($_GET['imagem'] ?? '');
    if (!empty($nome) and !empty($descrição) and !empty($localização)){
        if (empty($imagem)){
            if ($sistema->query("INSERT INTO vagas VALUES (DEFAULT, '$nome', '$descrição', '0', '$localização', DEFAULT)") == true){
                echo 'Vaga adcionada com Sucesso✅ <br>';
            }
        } else {
            if ($sistema->query("INSERT INTO vagas VALUES (DEFAULT, '$nome', '$descrição', '0', '$localização', '$imagem')") == true){
                echo 'Vaga adcionada com Sucesso✅ <br>';
            }
        }
    } else {
        echo 'Adicione os Dados da Vaga <br>';
    }
    ?>
    <button><a href="index.php"><img src="imgs/arrow_back_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" width="30"></a></button>
    <?php direitos() ?>
    <?php $sistema->close() ?>
</body>
</html>