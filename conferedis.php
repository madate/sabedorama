<?php
require_once 'conection.php';
if(isset($_POST['altera'])){
    $altera=$_POST['altera'];
    $sq=  mysql_query("SELECT * FROM perguntas where idperguntas=$altera");
    $array=  mysql_fetch_array($sq);
    
    
    
    echo"
<script>
	$(function() {

		$('#btna').button().click(function() {

var t = $('#per').val();
var r = $('#cer').val();
var j = $('#err').val();
var p = $('#ind').val();
var ca = $('#cad').val();
var id = $('#id').val();

    $.post('conferedis.php',{pergunta: t, certa: r, errada: j, indiferente: p, cad: ca, id: id},
  function(retorno){
  $('#retorna_pesquisa').load('pesquisa_perguntas.php?jogo='+jogo);

  $('#resposta').html(retorno);
  }, 'html');
			});
	});
	</script>        

<div style='border-style: solid; border-radius: 6px; padding:6px'>
<fieldset>
<h3>Alterar Pergunta</h3>
<table width='80%'><tr>
<td>Pergunta:</td><td> <input type='text' size='70' name='per' id='per' value='".$array['pergunta']."'/></td></tr>
<tr><td>Certa:</td><td> <input type='text' size='70' name='cer' id='cer' value='".$array['certa']."'/></td></tr>
<tr><td>Indiferente: </td><td><input type='text' size='70' name='ind' id='ind' value='".$array['indiferente']."'/></td></tr>
<tr><td>Errada:</td><td> <input type='text' size='70' name='err' id='err' value='".$array['errada']."'/></td></tr>

<tr><td colspan='2'><input type='hidden' name='cad' id='cad' value='4'/>
   <input type='hidden' name='id' id='id' value='$altera'/>
    
    <button id='btna'>Alterar</button></td></tr>
</fieldset>
</div>";
    
}
if(isset($_POST['linha'])) {
    $linha=$_POST['linha'];
    $col=$_POST['col'];
    $jogo=$_POST['jogo_e'];
    $sq_edit=mysql_query("SELECT * FROM perguntas WHERE linha=$linha AND coluna=$col AND jogo_idjogo=$jogo");
    $edit=mysql_fetch_array($sq_edit);
    echo"
<script>
	$(function() {

		$('#btna').button().click(function() {

var t = $('#per').val();
var r = $('#cer').val();
var j = $('#err').val();
var p = $('#ind').val();
var ca = $('#cad').val();
var id = $('#id').val();

    $.post('conferedis.php',{pergunta: t, certa: r, errada: j, indiferente: p, cad: ca, id: id},
  function(retorno){
  $('#resposta').html(retorno);
  }, 'html');
			});
	});
	</script>

    
<div style='border-style: solid; border-radius: 6px; padding:6px'>
<fieldset>
<h3>Alterar Pergunta</h3>
<table width='80%'><tr>
<td>Pergunta:</td><td> <input type='text' size='70' name='per' id='per' value='".$edit['pergunta']."'/></td></tr>
<tr><td>Certa:</td><td> <input type='text' size='70' name='cer' id='cer' value='".$edit['certa']."'/></td></tr>
<tr><td>Indiferente: </td><td><input type='text' size='70' name='ind' id='ind' value='".$edit['indiferente']."'/></td></tr>
<tr><td>Errada:</td><td> <input type='text' size='70' name='err' id='err' value='".$edit['errada']."'/></td></tr>

<tr><td colspan='2'><input type='hidden' name='cad' id='cad' value='4'/>
   <input type='hidden' name='id' id='id' value='".$edit['idperguntas']."'/>
    
    <button id='btna'>Alterar</button></td></tr>
</fieldset>
</div>
";

}
if(isset($_REQUEST['nome'])) {
    $dem=$_REQUEST['nome'];
    $dem = ucwords($dem);
    $valid = 'true';
    $sq_dem=mysql_query("SELECT nome FROM disciplina");
    while($demanda= mysql_fetch_array($sq_dem)) {
        if($dem==$demanda['nome']) {
            $valid = 'false';
        }
    }
    if(isset($_POST['cad'])) {

    }else {

        echo $valid;
    }

}
if(isset($_REQUEST['jogo'])) {
    $dem=$_REQUEST['jogo'];
    $dem = ucwords($dem);
    $valid = 'true';
    $sq_dem=mysql_query("SELECT nome FROM jogo");
    while($demanda= mysql_fetch_array($sq_dem)) {
        if($dem==$demanda['nome']) {
            $valid = 'false';
        }
    }
    if(isset($_POST['cad'])) {

    }else {

        echo $valid;
    }

}
if(isset ($_POST['cad'])) {
    $cad=$_POST['cad'];
    if($cad==1) {
        $nome=$_POST['nome'];
        $nome = ucwords($nome);
        mysql_query("INSERT INTO disciplina (nome) VALUES ('$nome')");
        echo"Disciplina cadastrada com sucesso!";
    }
    if($cad==2) {
        $nome=$_POST['jogo'];
        $dis=$_POST['disciplina'];
        $nome = ucwords($nome);
        mysql_query("INSERT INTO jogo (nome,iddisciplina) VALUES ('$nome',$dis)");
        echo"Jogo cadastrado com sucesso!";
    }
    if($cad==3) {
        $nome=$_POST['nome'];
        $id=$_POST['id_jogo'];
        $status=$_POST['status'];
        $ativo=$_POST['ativo'];
        $nome = ucwords($nome);
        $facil=$_POST['facil'];
    $normal=$_POST['normal'];
    $dificil=$_POST['dificil'];
        $sq_confere=mysql_query("SELECT idjogo FROM jogo WHERE nome='$nome' ");
        $count=  mysql_num_rows($sq_confere);
        if($count>0){
        $nome_ed=mysql_result($sq_confere, 0);
        }else{$nome_ed=0;}
        if($id==$nome_ed) {
            mysql_query("UPDATE  jogo SET ativo=$ativo, status= '$status', facil=$facil, normal=$normal, dificil=$dificil, nome='$nome' WHERE idjogo=$id");
            echo"Jogo alterado com sucesso!";

        }else {
            $sq_con=mysql_query("SELECT count(*) FROM jogo WHERE nome='$nome' ");
            $cont=mysql_result($sq_con, 0);
            if($cont>0) {
                echo"Erro- Já existe um jogo cadastrado com esse parametro!";
            }else {
                mysql_query("UPDATE  jogo SET  ativo=$ativo, status= '$status', facil=$facil, normal=$normal, dificil=$dificil, nome='$nome' WHERE idjogo=$id");
                echo"Jogo alterado com sucesso!";
            }

        }
        


    }
    if($cad==4) {
        $id=$_POST['id'];
        $pergunta=$_POST['pergunta'];
        $certa=$_POST['certa'];
        $errada=$_POST['errada'];
        $indiferente=$_POST['indiferente'];
        $ok=mysql_query("UPDATE perguntas SET pergunta='$pergunta', certa='$certa', errada='$errada', indiferente='$indiferente' WHERE idperguntas=$id");
        if($ok) {
            echo"<div class='alert alert-success'> Pergunta alterada com sucesso!</div>";
        }else {
            "<div class='alert alert-danger'>Erro- Pergunta não foi alterada</div>";
        }
    }
    if($cad==9) {
        $id=$_POST['id'];
        $nome=$_POST['nome'];
        
        $ok=mysql_query("UPDATE disciplina SET nome='$nome' WHERE  iddisciplina=$id");
        if($ok) {
            echo" Disciplina alterada com sucesso!";
        }else {
            "Erro- Disciplina não foi alterada";
        }
    }



}
?>
