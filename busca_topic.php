<?php
session_start();
require_once 'sesao.php';
require_once 'conection.php';
if(isset($_GET['order'])){$order=$_GET['order'];}else{$order="data desc";}
$sq_topicos=  mysql_query("SELECT * from topico order by $order");

?>
<script>
$(function(){
    $(".order").click(function(){
        var order=$(this).attr("id");
        $("#conteudo_forum").load("busca_topic.php?order="+order);
    });
    $(".topico").click(function(){
        var id=$(this).attr("id"); 
      $.ajax({
      type: 'post',
      data: {id:id,tipo:3},
      url:'cad_topico.php'
       });
       var temp=$("#novo").attr("title");
       $("#resp").html("<img  src='images/resp_topic.gif'/>")
if(temp=="novo"){
   
     $("#novo").html("<i class='icon-arrow-left'></i> Voltar");
     $("#novo").attr("title","voltar_1");

     $("#novo").addClass("btn");
    
     $("#conteudo_forum").load("abre_topic.php?id="+id);
  }
  if(temp=="voltar_1"){
   
       $("#novo").html("<img src='images/novo_topic.gif'/>");
   
      $("#novo").attr("title","novo");
       $("#novo").removeClass("btn");
      
     $("#conteudo_forum").load("busca_topic.php");   
     }
   });
    
});

</script>
<style>
    .order{text-decoration: none;
    color: black}
    .order:hover{text-decoration: none;
    color: white}
</style>

<table class="table table-bordered" >
    <thead>
        <tr class="topic">
            <th  colspan="2"><a href="#" id="titulo" class="order" >Tópicos</a></th>
        <th style="width: 150px"><a href="#" id="autor" class="order">Autor</a></label></th>
        <th style="width: 46px">Respostas</th>
        
    </tr>
    </thead>
    <tbody id="corpo_topic">
        <?php        
        
        while($topico= mysql_fetch_array($sq_topicos)){
            $lido=$topico['lido'];
            if($lido>0){$img_lido="forum_read.gif";
            $title="Forum foi vizualido  $lido vez(es)";
            
            }else{
                $title="Forum ainda não foi vizualizado";
                $img_lido="forum_unread.gif";}
        
        $sq_nome= mysql_query("SELECT nome from jogador where idjogador=".$topico['autor']);
        $autor=  mysql_result($sq_nome,0);
        $sq_resposta=  mysql_query("SELECT COUNT(*) FROM resposta where id_topic=".$topico['id']);
        $resposta=  mysql_result($sq_resposta, 0);
        echo"
        <tr class='list_topic'>
    <td style='width: 46px'><img title='$title' src='images/$img_lido'></td>
       <td><a href='#' id='".$topico['id']."' class='topico'>".$topico['titulo']."</a></td>
       <td>$autor</td>
       <td>$resposta</td>
   </tr>";
        }
        ?>
    </tbody>

</table>