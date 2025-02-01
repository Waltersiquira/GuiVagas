<?php 
$sistema = new mysqli('localhost', 'root', '', 'sistema');
if ($sistema->connect_errno){
    die('Erro de Conexão com Banco de Dados');
}
$sistema->query('set character_set_connection = utf8mb4');
$sistema->query('set character_set_client = utf8mb4');
$sistema->query('set character_set_results = utf8mb4');
?>