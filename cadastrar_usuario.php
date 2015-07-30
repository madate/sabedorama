<?php
require_once 'conection.php';
$nome=$_POST['nome'];
$login=$_POST['mail'];
$data=$_POST['data'];
$sexo=$_POST['sexo'];
$senha=$_POST['senha'];
$senha=md5($senha);
$ok=mysql_query("INSERT INTO jogador (nome, login, senha, data, sexo, admin,image) VALUES('$nome','$login', '$senha', '$data', '$sexo',0,'male.jpg') ");
if($ok){echo"$login-$senha";}else{echo "Errooo";}
?>