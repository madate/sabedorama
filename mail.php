<?php
ini_set("SMTP", "localhost");
//require 'conection.php';

require_once('PHPMailer_v5.1/class.phpmailer.php');

/*
$msg=$_POST['msg'];
$assunto=$_POST['assunto'];
$nome=$_POST['nome'];
$mail=$_POST['mail'];

$Titulo="[Sabedorama: $assunto]";
$email="madate@hotmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers

$headers .= 'From: Sabedorama <madatetalk@gmail.com>' . "\r\n";
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
    <ul>Caros, </ul>
     Novo contato pelo site sabedorama:<br>
     Nome: $nome,<br>
     Email: $mail,<br>
    Mensagem: $msg,<br>
     
       
            <br>
            <br>
    
                    </div>

";
 $send=mail($email,$Titulo,$men,$headers);
 if ($send) {
            echo"E-mail enviado com sucesso. Obrigado pelo contato!";
        } else {

            echo"Devido a problemas tecnicos não enviado seu e-mail favor mandar manualmente.";
        }
*/
/***--------------------------------------------------*/

$msg=$_POST['msg'];
$assunto=$_POST['assunto'];
$nome=$_POST['nome'];
$mail=$_POST['mail'];

$Titulo="[Sabedorama: $assunto]";
$email="madate@hotmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers

$headers .= 'From: Sabedorama <madatetalk@gmail.com>' . "\r\n";


 $phpmail = new PHPMailer();



    $phpmail->SetLanguage("br", "libs/");
      
             
      
      
    $phpmail->IsSMTP(); // envia por SMTP
    $phpmail->Host = "smtp.gmail.com"; // SMTP servers
    $phpmail->SMTPDebug  = 1;
    $phpmail->SMTPSecure = "SSL"; // Configura o tipo de criptografia do SMTP do Gmail, no caso, SSL
    $phpmail->Port = 465; // Configura porta do servidor SMTP do Gmail
  
    $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
     $phpmail->Username = "sabedorama@gmail.com"; // SMTP username
    $phpmail->Password = "33949440"; // SMTP password

        $phpmail->IsHTML(true);
        $phpmail->CharSet = "UTF-8";
        $phpmail->From = $mail;
        $phpmail->FromName = $nome;
        
         
          //$phpmail->AddAddress("contato@sabedorama.com.br"); 
        $phpmail->AddAddress("sabedorama@gmail.com");
        $phpmail->Subject = "[Sabedorama: $assunto]";
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
    <ul>Caros, </ul>
     Novo contato pelo site sabedorama:<br>
     Nome: $nome,<br>
     Email: $mail,<br>
    Mensagem: $msg,<br>
     
       
            <br>
            <br>
    
                    </div>

";



        $send = $phpmail->Send();
        if ($send) {
            echo"E-mail enviado com sucesso. Obrigado pelo contato!";
        } else {

            echo"Devido a problemas tecnicos não enviado seu e-mail favor mandar manualmente.";
        }
   

?> 
