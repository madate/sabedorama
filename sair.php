<?php
session_start();
unset($_SESSION['sabedorama']);
unset($_SESSION['username']);
if(isset($_SESSION['chatHistory'])){
unset($_SESSION['chatHistory']);
}
session_write_close(); 

 echo "<script>window.alert('Obrigado por utilizar o Sistema!')</script>";
       echo" <script>window.parent.location='index.php'</script>";
        
        ?>
    