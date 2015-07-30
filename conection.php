<?php
$conexao = mysql_connect("localhost", "root", "") or die ("sem chance");
//  $conexao = mysql_connect("localhost", "user_banco", "emocao") or die ("sem chance");
   
 $db = mysql_select_db("banco_jogo") or die("erro ao conectar banco");
    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
?>
