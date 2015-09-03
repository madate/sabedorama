
<?php
require_once 'conection.php';
//$id=$_REQUEST['disciplina'];


if(isset($_POST['disci2'])){
    $id=$_POST['disci2'];
     $i=1;
     $sq_disciplina=mysql_query("SELECT iddisciplina FROM disciplina WHERE nome='$id'");
     $nome=mysql_result($sq_disciplina,0);
    $sq=  mysql_query("SELECT * FROM jogo WHERE iddisciplina=$nome and ativo=1 order by nome");
    $row=mysql_num_rows($sq);
    if($row==0){echo "Nenhum jogo ativo para esta area de conhecimento!";}else{
    echo'
';
    while($s=  mysql_fetch_array($sq)){
     echo"<input type='button'  id='escolhe' value='" . $s['nome'] . "'/>";
        $i++;
    }
}
}
if(isset($_POST['disci'])){
    $id=$_POST['disci'];
     $i=1;
    $sq=  mysql_query("SELECT * FROM jogo WHERE iddisciplina=$id and ativo=1 order by nome");
    $row=mysql_num_rows($sq);
    if($row==0){echo "Nenhum jogo ativo para esta area de conhecimento!";}else{
    echo'<script>
	$(function() {
		$( "#radio" ).buttonset();
		
	});
	</script>
';
    while($s=  mysql_fetch_array($sq)){
     echo"<input type='radio' name='jog' id='jog$i' value='".$s['idjogo']."'/><label for='jog$i' style='margin-right: 5px'>".$s['nome']."</label><br><br>";   
        $i++;
    }
}
}
if(isset($_POST['disciplina_a'])){
$id=$_POST['disciplina_a'];

$sq_jogo=mysql_query("SELECT * FROM jogo WHERE iddisciplina=$id order by nome");
echo"<option>Escolha um jogo</option>";
        while($treino=mysql_fetch_array($sq_jogo)){
            echo"<option value='".$treino['idjogo']."'>".$treino['nome']."</option>";
        }
}
if(isset($_POST['porra'])){
$id=$_POST['porra'];

$sq_disciplina=mysql_query("SELECT * FROM disciplina WHERE iddisciplina=$id order by nome");
$disciplina=  mysql_fetch_array($sq_disciplina);
        echo"<input type='text' value='".$disciplina['nome']."' name='nome'/>";
        echo"<input type='hidden' value='".$disciplina['iddisciplina']."' name='id'/><br>";

        echo' <input  type="submit" value="Alterar" class="btn btn-success" ><input style="margin-left:8px" class="btn" type="reset" value="Limpar"/>
	';
}
if(isset($_POST['disciplina1'])){
$id=$_POST['disciplina1'];

$sq_jogo=mysql_query("SELECT * FROM jogo WHERE iddisciplina=$id order by nome");
echo"<option>Escolha um jogo</option>";
        while($treino=mysql_fetch_array($sq_jogo)){
            echo"<option value='".$treino['idjogo']."'>".$treino['nome']."</option>";
        }
}
if(isset($_POST['disciplina_ed'])){
$id=$_POST['disciplina_ed'];

$sq_jogo=mysql_query("SELECT * FROM jogo WHERE iddisciplina=$id order by nome");
echo"<option>Escolha um jogo</option>";
        while($treino=mysql_fetch_array($sq_jogo)){
            echo"<option value='".$treino['idjogo']."'>".$treino['nome']."</option>";
        }
}
if(isset($_POST['jogo_ed'])){
    
$id=$_POST['jogo_ed'];
$sq_jogo=mysql_query("SELECT * FROM jogo WHERE idjogo=$id order by nome");
$treino=mysql_fetch_array($sq_jogo);
echo"<tr>
                <td>Status</td>
                <td><select name='status'>
                        
                      <option>".$treino['status']."</option>
                        <option>Free</option>
                        <option>Logado</option>
                    </select></td>
            </tr>";
echo" <tr><td>Nome: </td><td><input type='text' size='40' name='nome' id='nome' value='".$treino['nome']."' /></td>";
echo" <tr><td>Fácil: </td><td><input type='text' size='40' name='facil' id='facil' maxlength='2' value='".$treino['facil']."' /></td>";
echo" <tr><td>Normal: </td><td><input type='text' size='40' name='normal' id='normal' maxlength='2' value='".$treino['normal']."' /></td>";
echo" <tr><td>Dificil: </td><td><input type='text' size='40' name='dificil' id='dificil' maxlength='2' value='".$treino['dificil']."' /></td>";
if($treino['ativo']==1){
    echo"<tr><td><input type='radio' value='1' name='ativo' checked />Ativo</td>";
    echo"<td><input type='radio' value='0' name='ativo' />Não ativo</td></tr>";
}else{
    echo"<tr><td><input type='radio' value='1' name='ativo' />Ativo</td>";
    echo"<td><input type='radio' value='0' name='ativo' checked />Não ativo</td></tr>";
}
echo"
<input type='hidden'  name='cad' value='3' />
<input type='hidden'  name='id_jogo' value='$id' />
        <tr><td><input  class='btn'type='submit' value='Calcular' ></td><td><input class='btn' type='reset' value='Limpar'/></td></tr>";
        
}
        ?>
