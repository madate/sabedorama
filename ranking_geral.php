
<div style='padding: 40px; min-width: 500px'>
     <meta charset="utf-8">
    
    <script src="jquery/jquery-1.7.2.js"></script>
    <script>
$(function(){
    $('.btn').click(function(){
       var idjogo= $(this).val();
     
       if(idjogo=="todos"){
   $("#todos").show('slow');    
   $("#jogo").hide('slow'); 
   
   }else{
       $("#todos").hide('slow');    
   $("#jogo").show('slow');
       $.ajax({  
                type: "POST",  
                url: "preenche_rank.php",  
                data: {id:idjogo},
                beforeSend: function(){
                    $('#jogo').html("<img src='img/loader_bg.gif'/>");
                },
                success: function(data)  
                {  
                   
                    $("#jogo").html(data);
                        
                }  
            }); 
            }
    }); 
});  
</script>
    
    
    
    <button class="btn" value="todos">Todos</button>
    <?php
 require_once 'conection.php';
 $sq_jogo = mysql_query("SELECT * from jogo where ativo=1");
 while($jogo=  mysql_fetch_array($sq_jogo)){
     
     echo"<button style='margin-left:2px' class='btn' value='".$jogo['idjogo']."/".$jogo['nome']."'>".$jogo['nome']."</button>";
 }
    
    ?>
        <br/>
        <br/>
        <div><img src="images/rank.png" style="width: 140px; height: 60px; float: left"> 
            <p style="text-align: center; font-size: 30px; float: left; vertical-align: middle">Ranking dos Jogadores</p>
        </div>
     <br/>
     
     <div id="todos">
    <table class='table table-bordered'>
      
        
       
            <thead>
    <tr>
        <th>Posição</th>
        <th>Nome</th>
        <th>Score</th>
        <th>Tempo</th>
      
    </tr>
    </thead>  

<?php

$posicao=0;

$sq_jogo_jogador=mysql_query("SELECT jogador_idjogador, AVG( score ) AS media_pontos, AVG( tempo_total ) AS tempo
FROM jogador_jogando
WHERE finalizado =1
GROUP BY jogador_idjogador
ORDER BY media_pontos DESC , tempo DESC 
LIMIT 0 , 20");
$i=0;

while($rank=mysql_fetch_array($sq_jogo_jogador)){
    $sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador='".$rank['jogador_idjogador']."'");

   $nome=mysql_result($sq_nome,0);
$posicao++;
$i++;
$cor="#ADD8E6";
if($i%2==0){
  $cor="#E0FFFF"; 
}

echo "<tr bgcolor='$cor' align='center'><td >".$posicao."º</td><td >$nome</td><td>".round($rank['media_pontos'],2)."</td><td>".gmdate("i:s",$rank['tempo'])."</td></tr>";
}
echo"</table></div>";

?>
    <div id="jogo"></div>
</div>