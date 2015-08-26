<?php
require_once 'conection.php';

    $nome=$_POST['jogo'];
    $dis=$_POST['disciplina'];
    $facil=$_POST['facil'];
    $normal=$_POST['normal'];
    $dificil=$_POST['dificil'];
    $status=$_POST['status'];
    mysql_query("INSERT INTO jogo (nome, iddisciplina, ativo,facil,normal,dificil,status) VALUES ('$nome', $dis, 0, $facil,$normal, $dificil,'$status')");
    echo "Jogo cadastrado com sucesso!";
    

?>
