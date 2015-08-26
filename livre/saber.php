<?php
session_start();
$treino=$_GET['treino'];
$nivel=$_GET['nivel'];
?>
<script src='../jquery/jquery-1.7.2.js'></script>
<script>
$(function(){
  // $("#conteudo").load("");
    $.post("sabedorama.php",{jogo:<?php echo"$treino"?>, nivel:<?php echo"$nivel"?>},
  function(retorno){
    $("#conteudo").html(retorno);
  }, "html");

});
</script>
<head>
      

  <title>Bem vindo ao Sabedorama</title>
</head>
<div id="conteudo"></div>