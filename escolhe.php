<?php
require_once 'header.php';
require_once 'conection.php';
?>
<script src="colorbox/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" href="colorbox/example5/colorbox.css" />
<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements

				$(".escolhe").colorbox();


				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>

<style>
    #escolhe{

        margin: 0 auto;
        width: 800px;
        background-color: #fbf8be;
        border: 1;
        margin-top: 30px;
        border-style: solid;
        border-radius: 30px 0 30px 0;
        box-shadow: 4px 6px 10px #FFFFFF;
        padding: 20px
}
   
    #next{
border-radius:5px;
-moz-border-radius:5px;
        width: 100px;
        margin-left: 10px;
        box-shadow: 0 0px 5px 3px #ffffff;
        height: 60px;
        background-color: #6d6d6d;
        background-image: url('images/f.png');

    }
   

</style>



 



        <div id="escolhe"> Escolha sua area de conhecimento<br><br>
            <?php
          
            $sq = mysql_query("SELECT * FROM disciplina");

            while ($s = mysql_fetch_array($sq)) {
                $sq_valida=mysql_query("SELECT count(*) from jogo where ativo=1 and iddisciplina=".$s['iddisciplina']);
                $valida=mysql_result($sq_valida,0);
                if($valida>0){
                echo"<button id='next' class='escolhe'  href='escolhe2.php?disciplina=" . $s['iddisciplina'] . "'/>" . $s['nome'] ."</button>";
                }
            }
?>
        </div>

<?php
require_once 'footer.php';
?>