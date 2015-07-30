<?php
ini_set("SMTP", "localhost");
require 'conection.php';

if(isset($_POST['reset'])){
$login=$_POST['login'];

$aux = $login.time();
$senha = substr(md5($aux),0,6);
$senha_cript=md5($senha);

$update=  mysql_query("update jogador set senha='$senha_cript' where login='$login'");

$men="
<html>
<head>
   <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  
</head>
<body>    
<div style=' background-color: #D4D0C8; 
width:600px;
    margin-right: 20px;
    margin-left: 100px;
    margin-bottom: 20px;
    margin-top: 20px;
    border-right-style: solid;
    border-left-style: solid;
    border-bottom-style: solid;
    border-top-style: solid;
    border-right-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-top-width: 1px'>
    <div style='margin-left: 20px; margin-right: 20px; margin-bottom: 20px'>
    <ul>Ola, </ul>
     Sua senha foi alterada para: $senha.<br>
         Vá agora para o Sabedorama e se divirta;
         <a href='http://www.sabedorama.com.br'>Ir para o Sabedorama</a>
        
     
       
            <br>
            <br>
    
                    </div>

";

$Titulo="[Sabedorama: Reset de senha]";
$email="contato@sabedorama.com.br";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers

$headers .= 'From: Sabedorama <contato@sabedorama.com.br>' . "\r\n";
 mail($login,$Titulo,$men,$headers);
        
       
echo"Sua senha foi alterada e enviada para seu e-mail!";
        
}
/*
require 'conection.php';
require_once('PHPMailer_v5.1/class.phpmailer.php');
if(isset($_POST['reset'])){
$login=$_POST['login'];

$aux = $login.time();
$senha = substr(md5($aux),0,6);
$senha_cript=md5($senha);

$update=  mysql_query("update jogador set senha='$senha_cript' where login='$login'");
if($update){echo "sim";}else{echo"nao";}

        $phpmail = new PHPMailer();



    
        $phpmail->SetLanguage("br", "libs/");
       $phpmail->IsSMTP(); // envia por SMTP
    $phpmail->Host = "smtp.gmail.com"; // SMTP servers
    $phpmail->SMTPSecure = "ssl"; // Configura o tipo de criptografia do SMTP do Gmail, no caso, SSL
    $phpmail->Port = 465; // Configura porta do servidor SMTP do Gmail
  
    $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
     $phpmail->Username = "titogregoxl@gmail.com"; // SMTP username
    $phpmail->Password = "naruto-81"; // SMTP password

        $phpmail->IsHTML(true);
        $phpmail->CharSet = "UTF-8";
        $phpmail->From = "contato@sabedorama.com.br";
        $phpmail->FromName = "Sabedorama";
        
         
          //$phpmail->AddAddress("contato@sabedorama.com.br"); 
        $phpmail->AddAddress($login);
        $phpmail->Subject = "[Sabedorama: Reset de senha]";
        // <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        $phpmail->Body .= "
  
<div style=' background-color: #D4D0C8; 
width:600px;
    margin-right: 20px;
    margin-left: 100px;
    margin-bottom: 20px;
    margin-top: 20px;
    border-right-style: solid;
    border-left-style: solid;
    border-bottom-style: solid;
    border-top-style: solid;
    border-right-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-top-width: 1px'>
    <div style='margin-left: 20px; margin-right: 20px; margin-bottom: 20px'>
    <ul>Ola, </ul>
     Sua senha foi alterada para: $senha.<br>
         Vá agora para o Sabedorama e se diverta;
         <a href='http://www.sabedorama.com.br'>Ir para o Sabedorama</a>
        
     
       
            <br>
            <br>
    
                    </div>

";



        $send = $phpmail->Send();
        if ($send) {
            echo"Sua senha foi alterada e enviada para seu e-mail!";
        } else {

            echo"Devido a problemas tecnicos não enviado seu e-mail favor mandar manualmente.$senha--update jogador set senha='$senha_cript' where login='$login'";
        }
}
*/

?> 
