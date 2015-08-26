<?php
session_start();
require_once 'conection.php';

//$id=$_SESSION["sabedorama"];
$treino=$_POST['jogo'];
$nivel=$_POST['nivel'];
$score=$_POST['recorde'];
$tempo=$_POST['tempo'];
$erros=$_POST['erros'];
$indi=$_POST['indi'];
$certos=$_POST['certos'];



  $sq_champ=mysql_query("SELECT jogador_idjogador
FROM jogador_jogando
WHERE finalizado =1
        AND nivel=$nivel
AND jogo_idjogo =$treino
ORDER BY score desc, tempo_total asc
LIMIT 0 , 3");
$i=0;


 while($champ=mysql_fetch_array($sq_champ)){

  $sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador=".$champ['jogador_idjogador']);
                            $camp[$i]=mysql_result($sq_nome,0);   
     $i++;
 }

 
?>
<script>
    $(document).ready(function(){
        setInterval(function() {

				$( "#cong" ).animate({
					 opacity:1
				}, 200, function(){$( "#cong" ).animate({
					 opacity:0},200);}).delay(600);


    },1000);
    $("#novo").click(function(){
                                    var novaURL = "treino.php?treino=<?php echo$treino; ?>&nivel=<?php echo$nivel; ?> ";
                                    $(window.document.location).attr('href',novaURL);

                                });
    });
</script>
<div style="width: 100%; height: 100%; background-color: white; padding: 10px 10px 10px 10px; margin: 0 auto">
    <br>
  
    
    <div class="row" >
        
<div id="cong1" style="  
       box-shadow: 0 0px 15px 3px #000;
        text-shadow: 2px 1px 0 #ffffff;
      
                      height: 150px;
                     
           padding: 10px 10px 10px 10px;
 
font-size: 50px;
font-family: verdana;
font-weight: bold;
 /* text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);*/
background: #cb60b3; /* Old browsers */
background: -moz-linear-gradient(top,  #cb60b3 0%, #c146a1 50%, #a80077 51%, #db36a4 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cb60b3), color-stop(50%,#c146a1), color-stop(51%,#a80077), color-stop(100%,#db36a4)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* IE10+ */
background: linear-gradient(to bottom,  #cb60b3 0%,#c146a1 50%,#a80077 51%,#db36a4 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cb60b3', endColorstr='#db36a4',GradientType=0 ); /* IE6-9 */


  -webkit-border-radius: 8px;
     -moz-border-radius: 8px;
          border-radius: 8px;          
                    
                      text-align: center;
                      vertical-align: middle" class="span7" >
    <br>
    <br>
    <div id="cong" style="opacity:0;">Parabéns!</div>
    <br>
    <div style ="margin-top: 10px; font-size: 20px"> Obrigado por testar o Sabedorama, faço o cadastro e tenha todas as vantagens.</div>


</div>
         <div class="span5 square_blue" >
      
        <h3> Sua Pontuação</h3>
        <br>
        <table bgcolor="silver " width="100%">
            <?php
           $total_resp=$erros+$certos+$indi;
            echo"<tr><td>Pontuação</td><td>".$score."</td></tr>
            <tr><td>Tempo</td><td>".gmdate("G:i:s",$tempo)."</td></tr>
            <tr><td>Total de respostas</td><td>$total_resp</td></tr>
            <tr><td>Acertos</td><td>".$certos."</td></tr>
            <tr><td>Erros</td><td>".$erros."</td></tr>";
            ?>
        </table>


    </div>
    
</div>
    <div class="row">
        <div class="span10">
     <button  title="Novo jogo" id="novo" class="btn "><i class="icon-refresh"></i>Novo Jogo</button>
                    <a href="escolhe.php" title="Escolher outro jogo" id="novo" class="btn "><i class="icon-refresh"></i>Escolher Jogo</a>
                    
        </div>
    </div>
    <br>
    
    <div class="row">
       
        <div class="span4 square_grey" >
            <h3>Os Campeões!</h3>
    <div style=" width: 300px; height: 150px; margin: 0 auto; " >
       
        <div style="float: left; margin-left: 15px">
            
            <div style="margin-top: 40px;width: 70px;"><?php echo substr($camp[1], 0, 10);?></div>
            <div style="width: 70px;font-size: 40px; height: 70px; 
                 background: rgb(69,72,77); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(69,72,77,1) 0%, rgba(0,0,0,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(69,72,77,1)), color-stop(100%,rgba(0,0,0,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
color: white;
                 vertical-align: middle; text-align: center;
                 border-color: #666; border-style: solid"><br>2</div>
            
        </div>
        <div style="float: left; margin-bottom: 2px;">
            <div style="width: 70px;"><?php echo substr($camp[0], 0, 10);?></div>
            <div style="width: 70px; font-size: 40px;
                 height: 110px; background: rgb(69,72,77); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(69,72,77,1) 0%, rgba(0,0,0,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(69,72,77,1)), color-stop(100%,rgba(0,0,0,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */

                 color: white; text-align: center;border-color: #666; border-style: solid"><br>1</div>
            
        </div>
        <div style="float: left; margin-bottom: 2px;vertical-align: bottom">
            <div style="margin-top: 60px; margin-left: 4px;width: 70px;"><?php echo substr($camp[2], 0, 10);?></div>
            <div style="width: 70px; font-size: 40px;height: 50px; 
                 background: rgb(69,72,77); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(69,72,77,1) 0%, rgba(0,0,0,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(69,72,77,1)), color-stop(100%,rgba(0,0,0,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
 color: white;vertical-align: middle; 
                 text-align: center;border-color: #666; border-style: solid"><br>3</div>
            
        </div>
    
    </div>
    </div>
   

     
        <div class="span8" style="height: 300px; overflow-y: auto">
        <?php $sq_nome_jogo=mysql_query("SELECT nome FROM jogo WHERE idjogo=$treino");
$nome_jogo=mysql_result($sq_nome_jogo, 0);
  
$sq_jogo_jogador=mysql_query("SELECT *
FROM jogador_jogando
WHERE finalizado =1
        AND nivel=$nivel
AND jogo_idjogo =$treino
ORDER BY score desc, tempo_total ASC
LIMIT 0 , 20");
$i=0;
echo "<table width='100%'><tr bgcolor='white'><td colspan='5' align='center'><img src='../images/rank.png' /> </td>";
echo "<tr bgcolor='white'align='center'><td>Nome</td><td>Jogo</td><td>Nível</td><td>Score</td><td>Tempo</td>";
while($rank=mysql_fetch_array($sq_jogo_jogador)){
    $sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador='".$rank['jogador_idjogador']."'");

   $nome=mysql_result($sq_nome,0);
   $nome=substr($nome,0,10);

$i++;
$cor="yellow";
if($i%2==0){
  $cor="cyan"; 
}
if($nivel==1){
    $nivel='Fácil';
}
if($nivel==2){
    $nivel='Normal';
}
if($nivel==3){
    $nivel='Difícil';
}
echo "<tr bgcolor='$cor' align='center'><td >$nome</td><td>$nome_jogo</td><td>$nivel</td><td>".$rank['score']."</td><td>".gmdate("G:i:s",$rank['tempo_total'])."</td></tr>";
}
echo"</table>";?>
            
            
    </div>



     
    </div> 
</div>




