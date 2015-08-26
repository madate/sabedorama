<?php
session_start();
$id=$_SESSION['sabedorama'];
require_once '../conection.php';
if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	include( 'm2brimagem.class.php' );
	$oImg = new m2brimagem( $_POST['img'] );
	if( $oImg->valida() == 'OK' )
	{
           
		$oImg->posicaoCrop( $_POST['x'], $_POST['y'] );
		$oImg->redimensiona( $_POST['w'], $_POST['h'], 'crop' );
		


//especifica o diretorio pra salvar a foto cropada 
$diretorio = '../img/'; 

//cria um nome aleatorio 
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_POST['img'], $XTs); 
$nome_novo = md5(uniqid(time())) . "." . $XTs[1]; 

//grava no diretorio, o nome aleatorio 
$oImg->grava( $diretorio . $nome_novo ); 

//apaga a imagem original 
$return = @unlink($_POST['img']);
mysql_query("UPDATE jogador SET image='$nome_novo' WHERE idjogador=$id");
echo $nome_novo;
	}
}
exit;