<?php
require_once 'conection.php';
if (isset($_FILES['arquivo']))
{
  
 $treino=$_POST['jogo1'];
if($treino=="Escolha um jogo"){
      echo"<script type=\"text/javascript\" language=\"javascript\">
                    window.alert(\" Favor informar o jogo! \");
                        
                </script>";
       echo " <script>window.parent.location='index.php'</script>";
    
}

$sq_valida_jogo=  mysql_query("SELECT COUNT(*) FROM perguntas WHERE jogo_idjogo=$treino");
$valida_jogo=  mysql_result($sq_valida_jogo,0);

if($valida_jogo>0){echo"<script type=\"text/javascript\" language=\"javascript\">
                    window.alert(\" Este jogo já tem $valida_jogo perguntas Cadastradas! \");
                        
                </script>";
       echo " <script>window.parent.location='index.php'</script>";}
    $erro=0;
    // Configurações
   
    $extensoes = array(".txt");
  
    // Recuperando informações do arquivo
    $nome = $_FILES['arquivo']['name'];
if(move_uploaded_file($_FILES['arquivo']['tmp_name'],"crop/".$nome)){echo "teste de envio";};
    // Verifica se a extensão é permitida
          
    if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {   
		$erro = 1;
	}
               
    // Se não houver erro
    if ($erro==0) {
   $lines = file("crop/".$nome);
$i=1;
$j=0;
$li=1;
$coluna=1;

foreach($lines as $line)
{
 
    switch($i) {
                case 1:
                $pergunta = utf8_encode($line);
                //$pergunta = trim($line);
                  //echo $pergunta;   
                break;
                
                case 2:
                $certa = utf8_encode($line);
              // $certa = trim($line);
                break;
                case 3:
                $indiferente = utf8_encode($line);
               //$indiferente = trim($line);
               
                break;
                
                case 4:
                $errada = utf8_encode($line);
               // $errada = trim($line);
               // echo "INSERT INTO perguntas (pergunta, certa, indiferente, errada,linha, coluna,  jogo_idjogo) VALUES ('$pergunta', '$certa', '$indiferente', '$errada',$li, $coluna, $treino)";
                $sql = "INSERT INTO perguntas (pergunta, certa, indiferente, errada,linha, coluna,  jogo_idjogo) VALUES (\"$pergunta\", \"$certa\", \"$indiferente\", \"$errada\",$li, $coluna, $treino)";
                $result = mysql_query($sql) or die(mysql_error());
            
                
        }
  
    if($i==4){
        $i=0;
        $coluna++;
        if($coluna==8){
            $li++;
            $coluna=1;
            
        }
    
        
    }
    
    $i++;
    
}
unlink("crop/".$nome);
  echo"<script type=\"text/javascript\" language=\"javascript\">
                    window.alert(\" Arquivo importado com Sucesso! \");
                        
                </script>";
       echo " <script>window.parent.location='index.php'</script>";
  

    }else{echo"<script type=\"text/javascript\" language=\"javascript\">
                    window.alert(\" Arquivo não foi importado! \");
                        
                </script>";
        echo " <script>window.parent.location='index.php'</script>";}
   
}else{
    
    echo"<script type=\"text/javascript\" language=\"javascript\">
                    window.alert(\" Favor enviar um arquivo! \");
                        
                </script>";
       echo " <script>window.parent.location='index.php'</script>";
}



 /*

     $treino=$_POST['jogo1'];
$nome = $_FILES['arquivo']['name'];
$nometmp = $_FILES['arquivo']['tmp_name'];
//if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$nome)){echo "teste de envio";};

  

$arquivo = fopen ($_FILES['arquivo']['name'], "r");
$i = 1;
$li=1;
$coluna=1;
while (!feof ($arquivo)) {
        $controle = $i % 4;
        $linha = fgets($arquivo, 4096);
        
        switch($i) {
                case 1:
                $pergunta = utf8_encode($linha);
                $pergunta = trim($linha);
                  echo $pergunta;   
                break;
                
                case 2:
                $certa = utf8_encode($linha);
                $certa = trim($linha);
                break;
                case 3:
                $indiferente = utf8_encode($linha);
                $indiferente = trim($linha);
               
                break;
                
                case 4:
                $errada = utf8_encode($linha);
                $errada = trim($linha);
                $sql = "INSERT INTO perguntas (pergunta, certa, indiferente, errada,linha, coluna,  jogo_idjogo) VALUES ('$pergunta', '$certa', '$indiferente', '$errada',$li, $coluna, $treino)";
                $result = mysql_query($sql) or die(mysql_error());
               
                
      }
      $i++;
        $coluna++;
        if($coluna==8){
          $li++;
          $coluna=1;
        }
}
fclose ($arquivo);
}
*/




?>
