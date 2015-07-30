<?php
require_once 'conection.php';
$jogo=$_GET['jogo'];
$nivel=$_GET['nivel'];
$sq_nome_jogo=mysql_query("SELECT nome FROM jogo WHERE idjogo=$jogo");
$nome_jogo=mysql_result($sq_nome_jogo, 0);
$sq_jogo_jogador=mysql_query("SELECT *
FROM jogador_jogando
WHERE finalizado =0
        AND nivel=$nivel
AND jogo_idjogo =$jogo
ORDER BY score desc, tempo_total DESC
LIMIT 0 , 20");
$i=0;
echo "<table width='100%'><tr bgcolor='white'><td colspan='5' align='center'><img src='images/rank.png' /> </td>";
echo "<tr bgcolor='white'align='center'><td>Nome</td><td>Jogo</td><td>Nível</td><td>Score</td><td>Tempo</td>";
while($rank=mysql_fetch_array($sq_jogo_jogador)){
    $sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador='".$rank['jogador_idjogador']."'");

   $nome=mysql_result($sq_nome,0);

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
echo"</table>";

?>
