<?php
 session_start();

 require_once 'conection.php';

 if(isset($_SESSION['sabedorama'])){
     $butao="<button id='jogar' class='btn btn-large btn-info' href='escolhe.php'> Jogar</button> ";
     $sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador='".$_SESSION['sabedorama']."'");
     $sq_img=mysql_query("SELECT image FROM jogador WHERE idjogador='".$_SESSION['sabedorama']."'");
                            $nome=mysql_result($sq_nome,0);
                            $img=mysql_result($sq_img,0);
                            if($img==""){$img="male.jpg";}
     $bem="Bem vindo $nome<a href='#' id='dados' class='btn' title='Meus dados'><i class='icon-wrench'></i></a> <a style='margin-left:8px' class='btn btn-danger' title='Sair do sistema' href='sair.php' ><i class='icon-off'></i></a>";
 }else{$bem=''; $butao="<button id='logar' class='btn btn-large btn-success' href='logar.php'>Faça Login</button>
     ou <a href='cadastro.php' class='btn'><i class='icon-thumbs-up'></i>Cadastrar!</a><br><br>
     <a href='livre/escolhe.php' class='btn btn-large btn-info'><i class='icon-fire'></i>Jogar modo de teste</a>";}

?>
<!DOCTYPE html>
<html lang="br">
  <head>
    
    <meta charset="utf-8">
    <title>Bem vindo ao Sabedorama</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Tito Paulo">
    <script src="jquery/jquery-1.9.0.js"></script>

<script src="colorbox/colorbox/jquery.colorbox.js"></script>

<script src="js/bootstrap.js"></script>

    <!-- Le styles -->
    
    <link rel="stylesheet" href="colorbox/example5/colorbox.css" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      #ed_dados{
          width: 150px;
          height: 180px;
          border: 2px solid #000;
          padding: 8px;
          background-color:  #DADADA;
          font-size: 12px;
             position: absolute;
       right: 0;
   
       margin-right: 130px;
      }
    </style>
    <script>
$(function(){
    $("#ed_dados").hide();
    $("#dados").click(function(){
        $("#ed_dados").toggle('low');
        
    });
});    
</script>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
     </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
           
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          
          </a>
            <a class="brand" href="index.php">Sabedorama</a>
      
        <span style="color: #e9322d ; font-size: 18px; float: right; margin-top: 8px;margin-right: 20px;font-weight: bold; text-shadow: 0.5px 0.5px 2px #CFCFCF;">
            <?php echo$bem;?>
            
           </span>
                  
        </div>
      </div>
         <div id="ed_dados">
             <img src="img/<?php echo $img?>" width="40px" height="40px" style="border: 3px solid #CFCFCF; border-radius: 2px; box-shadow: 0 0 3px #000">   
             <br>
                <a href="#">Editar seus dados</a>
                <br>
                <a href="crop/crop-simples.php">Editar sua foto</a>
            </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
          <h1 style="text-align: center">Sabedorama Forum</h1>
       
      </div>

      <!-- Example row of columns -->
      <!-- Example row of columns -->
     


<style>
   
 /* Let's get this party started */
::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
    
    .topic {
        background-color:  #3a87ad;
          text-align: center;
          vertical-align:  middle
    }
    .resp_topic {
        background-color:   #72A545;
          text-align: center;
          vertical-align:  middle
    }
    .abre_topic {
        background-color:  #A2A09A;
          text-align: center;
          vertical-align:  middle
    }
    .list_topic a{
        text-decoration: none;
       
        color: #000;
        font-size: 14px;
    }
    .list_topic a:hover{
        
        color: sienna;
     
    }
  
</style>
<script>
$(function(){
  $("#h").load("online/online.php");
  $("#conteudo_forum").load("busca_topic.php"); 
     setInterval(function() {

$("#h").load("online/online.php");

    },60000);
  
 $("#novo").click(function(){
    var temp=$(this).attr("title");
   
if(temp=="novo"){
   
     $(this).html("<i class='icon-arrow-left'></i> Voltar");
     $(this).attr("title","voltar_1");

     $(this).addClass("btn");
    
     $("#conteudo_forum").load("novo_topic.php");
  }
  if(temp=="voltar_1"){
   
       $(this).html("<img src='images/novo_topic.gif'/>");
   
      $(this).attr("title","novo");
       $(this).removeClass("btn");
      $("#resp").html("");
     $("#conteudo_forum").load("busca_topic.php");   
     }
   }); 
   $("#resp").click(function(){
   var id_topic=$("#id_topic").val();
   
     $("#conteudo_forum").load("resp_topic.php?id_topic="+id_topic);  
   });
   
});

</script>


<div id="h"></div>

<a href="#" id="novo" title="novo" ><img  src="images/novo_topic.gif"/></a>
<a href="#" id="resp" title="responder" ></a>
<br/>
<div style="height: 280px; margin-top: 15px;">
<div id="online" style="width: 210px; height: 260px; overflow-y: auto; margin-right: 20px; float: left">
    <?php


$SQL  = "SELECT * FROM acessos_online where id != ".$_SESSION['sabedorama']." ORDER BY id";
$RS   = mysql_query($SQL);
$RS1   = mysql_query($SQL);
$total=mysql_num_rows($RS1);
 //echo "SELECT * FROM acessos_online where id != ".$_SESSION['sabedorama']." ORDER BY id";
?>
    <link type="text/css" rel="stylesheet" media="all" href="online/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="online/css/screen.css" />


<style>
    #bola{
        width: 10px;
        height: 10px;
        background-color: green;
        box-shadow: 0 0 5px  mediumspringgreen;
        border-radius:10px;
    }
</style>
<table width="100%" style="float:left; border:1px solid #CCCCCC" align="center" cellpadding="4" cellspacing="1">
<tr bgcolor="#EFEFEF">
    <td colspan="2">
    	<p>Chat Sabedorama</p>
    </td>
</tr>
<tr bgcolor="#EFEFEF" >
    <td colspan="2">
    	<strong>Pessoas online agora:</strong> <?php echo $total; ?>
    </td>
</tr>

<?php
$nome_q=  explode(" ", $nome);
  $_SESSION['username'] = $nome_q[0];
while($RF = mysql_fetch_array($RS))
{
   
$sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador='".$RF['id']."'");
//echo"SELECT nome FROM jogador WHERE idjogador='".$RF['id']."'";
                           $nome_l=mysql_result($sq_nome,0);
                           $nome_s=  explode(" ", $nome_l);
                       
    echo $nome_l;                       
echo"	<tr bgcolor='#EFEFEF'>
    	<td><label id='bola'></label></td>
    	<td><a href='javascript:void(0)' onclick='javascript:chatWith(\"".$nome_s[0]."\")' style='text-decoration: none;color: #000;'> $nome_l</a></td>
    </tr>";
	
}
?>
</table>


<script type="text/javascript" src="online/js/jquery.js"></script>
<script type="text/javascript" src="online/js/chat.js"></script>
    
    
</div>
<div id="conteudo_forum" style="width: 840px;   margin-left: 10px;height: 380px;overflow-y: auto;float: left " >
    

</div>
</div>
<br>
<br>
<br>
<br>
<br>

<?php
require_once 'footer.php';
?>
