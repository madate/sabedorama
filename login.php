<?php
session_start();
require_once 'conection.php';
if(isset($_REQUEST['mail'])) {
    $dem=$_REQUEST['mail'];
    
    $valid = 'true';
    $sq_dem=mysql_query("SELECT COUNT(login) FROM jogador where login='$dem'");
    $login= mysql_result($sq_dem,0);
       
    if($login>0){
        
        $valid='false';
    }
    if(isset($_POST['cad'])) {

    }else {

        echo $valid;
    }

}
if(isset($_REQUEST['login'])) {
    $dem=$_REQUEST['login'];

    $valid = 'true';
    $sq_dem=mysql_query("SELECT COUNT(login) FROM jogador where login='$dem'");
    $login= mysql_result($sq_dem,0);

    if($login==0){

        $valid='false';
    }
    if(isset($_POST['cad'])) {

    }else {

        echo $valid;
    }

}
if(isset($_POST['cad'])){
$login=$_POST['login'];
$senha=$_POST['senha'];
$senha=  md5($senha);

$sql=mysql_query("SELECT * FROM jogador WHERE login ='$login'");
$resultsenha=mysql_fetch_array($sql);
$resultnome=mysql_num_rows($sql);

if($resultnome==1 && $senha==$resultsenha['senha']){
if($resultsenha['admin']=="1"){
  $_SESSION["admin"] = "ok";  
}else{
   $_SESSION["admin"] = "no";  
}

$_SESSION["sabedorama"] = $resultsenha['idjogador'];
//$_SESSION["jogador"] = $resultsenha['idjogador'];



 echo " <script>window.parent.location='index.php'</script>";

}else{
    
    
       echo" Login ou senha inválidos!<br>
           <a href='recupera_senha.php'>Recuperar Senha</a>";
}
}

if(isset($_POST['cadastro'])){
    $temp=$_POST['cadastro'];
    $temp=  explode("-", $temp);
$login=$temp[0];
$senha=$temp[1];

//$senha=  md5($senha);

$sql=mysql_query("SELECT * FROM jogador WHERE login ='$login'");
$resultsenha=mysql_fetch_array($sql);
$resultnome=mysql_num_rows($sql);

if($resultnome==1 && $senha==$resultsenha['senha']){
if($resultsenha['admin']=="1"){
  $_SESSION["admin"] = "ok";  
}else{
   $_SESSION["admin"] = "no";  
}
$_SESSION["sabedorama"] = $resultsenha['idjogador'];
//$_SESSION["jogador"] = $resultsenha['idjogador'];



 echo " <script>window.parent.location='index.php'</script>";

}else{
    
    
       echo" Login ou senha inválidos!
            ";
}
}
?>
