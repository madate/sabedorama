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
    <script src="jquery/jquery-1.7.2.js"></script>

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
          <h1 style="text-align: center">Sabedorama</h1>
       
      </div>

      <!-- Example row of columns -->
     

    
