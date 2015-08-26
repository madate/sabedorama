<?php
session_start();
require_once '../conection.php';

//Usuários online
$tempmins = 1; 
//Código:
$ses_id = $_SERVER['REMOTE_ADDR'];
$ip     = $ses_id;
$id=$_SESSION['sabedorama'];
$select = mysql_query( "SELECT * FROM acessos_online WHERE id='".$id."'" );
if( mysql_num_rows($select) > 0 ) 
{
	mysql_query('UPDATE acessos_online SET time="'.time().'", id="'.$id.'" WHERE id="'.$id.'"');
} 
else 
{
	mysql_query('INSERT INTO acessos_online (ip,time,id) VALUES ("'.$ip.'","'.time().'","'.$id.'")');
}

mysql_query('DELETE FROM acessos_online WHERE time<'.(time()-($tempmins*60)));

?>