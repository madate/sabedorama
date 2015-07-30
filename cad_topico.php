<?php
session_start();
require_once 'sesao.php';
require_once 'conection.php';
$tipo=$_POST['tipo'];
if($tipo==1){
    $titulo=$_POST['titulo'];
    $msg=$_POST['msg'];
    $data=  time();
    $autor=$_SESSION['sabedorama'];
   $ok=  mysql_query("insert into topico (titulo,msg,autor,data) values ('$titulo','$msg',$autor,$data)");  
    if($ok){
    echo"Tópico cadastrado com sucesso!";
    }else{echo"Erro ao cadastrar tente mais tarde!";}
}
if($tipo==2){
    $id=$_POST['id_topic'];
    $msg=$_POST['msg'];
     $data=  time();
    $autor=$_SESSION['sabedorama'];
    $ok=  mysql_query("insert into resposta (id_topic,msg,autor,data) values ('$id','$msg',$autor,$data)");  
    if($ok){
     echo"Resposta cadastrada com sucesso!";
    }else{echo"Erro ao cadastrar tente mais tarde!";}
    
   }
    
    if($tipo==3){
        $id=$_POST['id'];
        $sq_lido=  mysql_query("SELECT lido from topico where id=$id");
        $lido=  mysql_result($sq_lido, 0);
        $lido++;
        mysql_query("update topico set lido=$lido where id=$id");
     
    }
   
    if($tipo==4){
          $autor=$_SESSION['sabedorama'];
        
        $id_topic=$_POST['id'];
   $ok= mysql_query("INSERT INTO denunciar (id_topic,denunciante) VALUES ($id_topic,$autor)");
     if($ok){echo "Topico denunciado com sucesso!";}else{ echo "Topico não foi denunciado, tente mais tarde!";}
    }
 if($tipo==5){
          $autor=$_SESSION['sabedorama'];
        
        $id_resp=$_POST['id'];
   $ok= mysql_query("INSERT INTO denunciar (id_resp,denunciante) VALUES ($id_resp,$autor)");
     if($ok){echo "Resposta denunciada com sucesso!";}else{ echo "Resposta não foi denunciado, tente mais tarde!";}
    }
 if($tipo==6){
         // $autor=$_SESSION['sabedorama'];
        
        $id_topico=$_POST['id'];
   $ok= mysql_query("delete from topico where id=$id_topico");
     if($ok){echo "Tópico excluido com sucesso!";}else{ echo "delete from topico where id=$id_topico";}
    }
?>
