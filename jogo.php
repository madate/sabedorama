<?php
session_start();
$jogo=$_GET['jogo'];
$nivel=$_GET['nivel'];
?>
<script src='jquery/jquery-1.7.2.js'></script>
<script>
$(function(){
  // $("#conteudo").load("");
    $.post("jogo_j.php",{jogo:<?php echo"$jogo"?>, nivel:<?php echo"$nivel"?>},
  function(retorno){
    $("#conteudo").html(retorno);
  }, "html");

});
</script>
<head>
      

  <title>Bem vindo ao Sabedorama</title>
</head>
<div id="conteudo"></div>