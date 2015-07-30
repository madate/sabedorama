<?php
require_once 'conection.php';
//require_once 'header.php';
if(isset ($_POST['jogo'])){
$id=$_POST['jogo'];}


?>

<script src='jquery/jquery-1.7.2.js'></script>
<script src="jquery/external/jquery.bgiframe-2.1.2.js"></script>
<script src="jquery/ui/jquery.ui.core.js"></script>
<script src="jquery/ui/jquery.ui.widget.js"></script>
<script src="jquery/ui/jquery.ui.mouse.js"></script>
<script src="jquery/ui/jquery.ui.button.js"></script>
<script src="jquery/ui/jquery.ui.draggable.js"></script>
<script src="jquery/ui/jquery.ui.position.js"></script>
<script src="jquery/ui/jquery.ui.resizable.js"></script>
<script src="jquery/ui/jquery.ui.dialog.js"></script>
<script src="jquery/ui/jquery.effects.core.js"></script>
<script src="jquery/ui/jquery.effects.blind.js"></script>

<script src="jquery/ui/jquery.effects.slide.js"></script>
<script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>



<?php
echo"

<table border='1'><tr bgcolor='white'>
    ";
    $col=0;
    $linha=24;
    for($i=168;$i>0;$i--){
            $col++;
            $sq_pergunta=mysql_query("SELECT COUNT(*) FROM perguntas WHERE linha=$linha AND coluna=$col AND jogo_idjogo=$id");
$conf=mysql_result($sq_pergunta, 0);
if($conf==1){
        echo"<td bgcolor='red' style='width:50px' title='Click para alterar a pergunta!'>
    <script>
    $(function() {
$('#btn$i').button()
        .click(function() {
var t = $('#linha$i').val();
var r = $('#col$i').val();
var j = $('#jogo').val();
    $.post('conferedis.php',{linha: t, col: r, jogo_e: j},
  function(retorno){
  $('#resposta').html(retorno);
  }, 'html');

            
        });
        });
</script>
    <input type='hidden' name='linha' value='$linha' id='linha$i'>
    <input type='hidden' name='jogo' value='$id' id='jogo'>
    <input type='hidden' name='col' value='$col' id='col$i'><button id='btn$i'  style='border:0; background-color: red'> $i</button></form>
</td>";
    }else{
        echo"<td bgcolor='green' style='width:50px'>$i</td>";
    }
         if($col>6){
            $linha--;
            if($linha==0){}else{
            echo"<tr bgcolor='white'>";
            $col=0;
            }
        }


    }
   
echo"</table>";
?>
