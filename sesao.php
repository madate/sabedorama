<?php

require 'conection.php';
if(isset ($_SESSION['sabedorama'])){}else {
     echo"<script type=\"text/javascript\" language=\"javascript\">
                    window.alert(\"Acesso negado faça Login! \");

                </script>";
        echo " <script>window.parent.location='index.php'</script>";
}
?>
