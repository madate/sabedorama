<?php
require_once 'conection.php';
$treino=$_GET['treino'];
$sq_perguntas=  mysql_query("SELECT idperguntas, pergunta from perguntas where jogo_idjogo=$treino order by pergunta");
echo"<script>
    $(function() {
$('.per').click(function() {
    var per=$(this).attr('name');

 $.post('conferedis.php',{altera: per},
  function(retorno){
  $('#retorna_pesquisa').html(retorno);
  }, 'html');
        });
        });
</script>";
while($per=  mysql_fetch_array($sq_perguntas)){
    
    echo"<a href='#' class='per' name='".$per['idperguntas']."'>".$per['pergunta']."</a><br>";
}

?>
