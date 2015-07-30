<?php
require_once '../conection.php';
require_once 'online.php';
$_SESSION['username'] = "opaaaa";
$SQL  = "SELECT * FROM acessos_online ORDER BY id";
$RS   = mysql_query($SQL);
$RS1   = mysql_query($SQL);
$total=mysql_num_rows($RS1);
 
?>
    <link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />


<style>
    #bola{
        width: 10px;
        height: 10px;
        background-color: green;
        box-shadow: 0 0 5px  mediumspringgreen;
        border-radius:10px;
    }
</style>
<table width="100%" style="float:left; border:1px solid #CCCCCC" align="center" cellpadding="4" cellspacing="1">
<tr bgcolor="#EFEFEF">
    <td colspan="2">
    	<p>Chat Sabedorama</p>
    </td>
</tr>
<tr bgcolor="#EFEFEF" >
    <td colspan="2">
    	<strong>Pessoas online agora:</strong> <?php echo $total; ?>
    </td>
</tr>

<?php

while($RF = mysql_fetch_array($RS))
{
   
$sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador='".$RF['id']."'");

                           $nome=mysql_result($sq_nome,0);
                           $nome_s=  explode(" ", $nome);
echo"	
    
<tr bgcolor='#EFEFEF'>
    	<td><label id='bola'></label></td>
    	<td><a href='javascript:void(0)' onclick='javascript:chatWith(\"".$nome_s[0]."\")' style='text-decoration: none;color: #000;'> $nome</a></td>
    </tr>";
	
}
?>
</table>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>