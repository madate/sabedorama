<?php
session_start();
require_once 'sesao.php';
require_once 'conection.php';
$id=$_GET['id'];
$id_sessao=$_SESSION['sabedorama'];
$sq_topico=  mysql_query("SELECT * FROM topico where id=$id");
$sq_resposta = mysql_query("SELECT * FROM resposta where id_topic=$id");
$topico= mysql_fetch_array($sq_topico);
if($id_sessao==$topico['autor']){
    $editar="<a href='#' id='edit_topic' title='Editar Tópico'><img src='images/icon_post_edit.gif'/></a>";
    $excluir="<a href='#' id='exclui_topic' title='Excluir Tópico'><img src='images/icon_post_delete.gif'/></a>";
    
}

$sq_autor_topic=  mysql_query("SELECT nome from jogador where idjogador=".$topico['autor']);
$sq_autor_img=  mysql_query("SELECT image from jogador where idjogador=".$topico['autor']);
$autor_topic=  mysql_result($sq_autor_topic,0);
$autor_img=  mysql_result($sq_autor_img,0);
if($autor_img==" "){$autor_img="male.jpg";}
?>
<link rel="stylesheet" href="jquery/themes/ui-lightness/jquery.ui.all.css">
	<script src="jquery/jquery-1.9.0.js"></script>
	<script src="jquery/ui/jquery.ui.core.js"></script>
	<script src="jquery/ui/jquery.ui.widget.js"></script>
	<script src="jquery/ui/jquery.ui.mouse.js"></script>
	<script src="jquery/ui/jquery.ui.button.js"></script>
	<script src="jquery/ui/jquery.ui.draggable.js"></script>
	<script src="jquery/ui/jquery.ui.position.js"></script>
	<script src="jquery/ui/jquery.ui.button.js"></script>
	<script src="jquery/ui/jquery.ui.dialog.js"></script>

	<script>
	$(function() {
		
      //script para denunciar topico;
                
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
	 $("#denunciar_topic").click(function(){
        var id_dec=<?php echo $id;?>;
        
      $( "#dialog-confirm" ).html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Deseja realmente denunciar este tópico?</p>');
      $( "#dialog-confirm" ).dialog({
			resizable: true,
			height:160,
                        width:300,
			modal: true,
			buttons: {
				"SIM": function() {
                                    $( this ).dialog( "close" );
                                    $.ajax({
      type: 'post',
      data: {id:id_dec,tipo:4},
      url:'cad_topico.php',
      success: function(retorno){
         $( "#dialog-confirm2" ).html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>'+retorno+'</p>');
      $( "#dialog-confirm2" ).dialog({
			resizable: true,
			height:160,
                        width:300,
			modal: true,
			buttons: {
				"OK": function() {
                                   
					$( this ).dialog( "close" );
				}
			}
		})
      }
       });
					
				},
				"NÃO": function() {
					$( this ).dialog( "close" );
				}
			}
		});
    });
	//----------------------------------------------------------------------------------------------------
// Denunciar resposta-------------------------------------------------------------	
	 $(".denunciar_resp").click(function(){
        var id_resp=$(this).attr('id');
       
      $( "#dialog-resp" ).html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Deseja realmente denunciar esta resposta?</p>');
      $( "#dialog-resp" ).dialog({
			resizable: true,
			height:160,
                        width:300,
			modal: true,
			buttons: {
				"SIM": function() {
                                    $( this ).dialog( "close" );
                                    $.ajax({
      type: 'post',
      data: {id:id_resp,tipo:5},
      url:'cad_topico.php',
      success: function(retorno){
         $( "#dialog-resp2" ).html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>'+retorno+'</p>');
      $( "#dialog-resp2" ).dialog({
			resizable: true,
			height:160,
                        width:300,
			modal: true,
			buttons: {
				"OK": function() {
                                   
					$( this ).dialog( "close" );
				}
			}
		})
      }
       });
					
				},
				"NÃO": function() {
					$( this ).dialog( "close" );
				}
			}
		});
                
    });
//********************************************************************************************************************88		
// excluir topic	
	 $("#exclui_topic").click(function(){
        var id_topic=<?php echo $id;?>;
       
      $( "#dialog-exclui-topic" ).html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Deseja realmente excluir este tópico?</p>');
      $( "#dialog-exclui-topic" ).dialog({
			resizable: true,
			height:160,
                        width:300,
			modal: true,
			buttons: {
				"SIM": function() {
                                    $( this ).dialog( "close" );
                                    $.ajax({
      type: 'post',
      data: {id:id_topic,tipo:6},
      url:'cad_topico.php',
      success: function(retorno){
         $( "#dialog-exclui-topic2" ).html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>'+retorno+'</p>');
      $( "#dialog-exclui-topic2" ).dialog({
			resizable: true,
			height:160,
                        width:300,
			modal: true,
			buttons: {
				"OK": function() {
                                   
					$( this ).dialog( "close" );
				}
			}
		})
      }
       });
					
				},
				"NÃO": function() {
					$( this ).dialog( "close" );
				}
			}
		});
                
    });
//********************************************************************************************************************88		
	
	});
	</script>



<div id="dialog-confirm" title="Denunciar Tópico?">
	
</div>
<div id="dialog-confirm2" title="Denunciar Tópico?">
	
</div>
<div id="dialog-resp" title="Denunciar Resposta?">
	
</div>
<div id="dialog-resp2" title="Denunciar Resposta?">
	
</div>
<div id="dialog-exclui-topic" title="Excluir Tópico?">
	
</div>
<div id="dialog-exclui-topic2" title="Excluir Tópico?">
	
</div>
<style>
   .img{ border: 3px solid #CFCFCF; border-radius: 2px; box-shadow: 0 0 3px #000}
</style>
<input type="hidden" id="id_topic" value="<?php echo $id;?>"/>
<table class="table table-bordered" >
    <thead>
        <tr class="abre_topic">
            <th  align="center">Autor</th>
        <th>Mensagem</label></th>
       
        
    </tr>
    </thead>
    <tbody >
        <tr class="list_topic">
            <td style="width: 90px"><?php echo $autor_topic;?></td>
            
       <td><b>Titulo: <?php echo $topico['titulo'];?></b></td>
       
        </tr>
        <tr>
            <td><img class="img" src="img/<?php echo $autor_img;?>" width="80" height="80"></td>
       <td><?php echo $topico['msg'];
       echo"<br>";
       echo $editar;
       echo $excluir;
       
       ?>
       <a href='#' id='denunciar_topic'  title='Denunciar Tópico'><img src='images/icon_post_report.gif'/></a>
       </td>
       
   
   </tr>
       
            <?php
     while($resposta=  mysql_fetch_array($sq_resposta)){
         $sq_autor_resp=  mysql_query("SELECT nome from jogador where idjogador=".$resposta['autor']);
$sq_autor_img_resp=  mysql_query("SELECT image from jogador where idjogador=".$resposta['autor']);
$autor_resp=  mysql_result($sq_autor_resp,0);
$autor_img_resp=  mysql_result($sq_autor_img_resp,0);
if($id_sessao==$resposta['autor']){
    $editar_resp="<a href='#' id='edit_resp' title='Editar Resposta'><img src='images/icon_post_edit.gif'/></a>";
    $excluir_resp="<a href='#' id='exclui_resp' title='Excluir Resposta'><img src='images/icon_post_delete.gif'/></a>";
    
}
if($autor_img_resp==" "){$autor_img_resp="male.jpg";}
         echo" <tr class='resp_topic'> <td style='width: 90px'>$autor_resp</td>
            
       <td>Resposta: ".$topico['titulo']."</td>
       
        </tr>
        <tr>
            <td><img  class='img' src='img/$autor_img_resp' width='80' height='80'></td>
       <td>".$resposta['msg']."
<br>
<a href='#' id='".$resposta['id']."' class='denunciar_resp' title='Denunciar resposta'><img src='images/icon_post_report.gif'/></a>
$editar_resp $excluir_resp 
</td>
      
   
   </tr>
        ";
     }
            
            ?>
            
            
            

</table>