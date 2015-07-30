<?php
require_once 'conection.php';
$id=$_POST['id'];
$jogo=  explode("/", $id);
echo"<table class='table table-bordered'>
      
        
       
            <thead>
    <tr>
    <th>Posição</th>
        <th>Nome</th>
        <th>Score</th>
        <th>Tempo</th>
        <th>Jogo</th>
        
      
    </tr>
    </thead>  

";


$posicao=0;
$sq_jogo_jogador=mysql_query("SELECT jogador_idjogador, AVG( score ) AS media_pontos, AVG( tempo_total ) AS tempo
FROM jogador_jogando
WHERE finalizado =1
AND jogo_idjogo=".$jogo[0]."
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

echo "<tr bgcolor='$cor' align='center'><td >".$posicao."º</td><td >$nome</td><td>".round($rank['media_pontos'],2)."</td><td>".gmdate("i:s",$rank['tempo'])."</td><td>$jogo[1]</td></tr>";
}
echo"</table></div>";


?>
