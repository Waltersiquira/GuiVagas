<?php 
function proteger_contra_xss_e_sql_injection($valor){
    require_once 'sistema.php';
    global $sistema;
    $valor = $sistema->real_escape_string($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}
?>