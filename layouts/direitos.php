<?php 
function direitos(){
    $ip = $_SERVER['REMOTE_ADDR'];
    $data = date('d/m/Y');
    echo "<footer><p>o $ip acessou o site em $data <br> &copy; GuiVagas 2025.</p></footer>";
}
?>