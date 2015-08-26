<?php
require_once 'conection.php';
if(isset ($_POST['pergunta'])){
    $pergunta=$_POST['pergunta'];
    $certa=$_POST['certa'];
    $errada=$_POST['errada'];
    $indiferente=$_POST['indiferente'];
    $treino=$_POST['jogo'];
   $sq_posicao=  mysql_query("select linha, coluna from perguntas where jogo_idjogo= $treino order by idperguntas desc");
   $count=  mysql_num_rows($sq_posicao);
   if($count==0){
       $linha=1;
       $coluna=1;
   }else{
   $posicao=  mysql_fetch_array($sq_posicao);
   $linha= $posicao['linha'];
   $coluna=  $posicao['coluna'];
   
   if($coluna==7){
       $linha++;
       $coluna=1;
   }else{
       $coluna++;
   }
   }
    
       $ok= mysql_query("INSERT INTO perguntas (pergunta,certa,errada,indiferente,jogo_idjogo,linha,coluna) VALUES ('$pergunta','$certa', '$errada','$indiferente',$treino,$linha,$coluna)");
        
       if($ok){echo"Cadastro realizado com sucesso!";
       }else {
           echo"INSERT INTO perguntas (pergunta,certa,errada,indiferente,jogo_idjogo,linha,coluna) VALUES ('$pergunta','$certa', '$errada','$indiferente',$treino,$linha,$coluna)";
       }
    

}
?>
