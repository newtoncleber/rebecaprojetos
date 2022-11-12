<?php
define('HOST', 'localhost');
define('USUARIO', 'rebeca');
define('SENHA', '5CToy5vVLVkN');
define('DB', 'rebeca');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
$con = new \PDO("mysql:host=".HOST.";dbname=".DB."",USUARIO,SENHA);
?>