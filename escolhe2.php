<?php

require_once 'conection.php';
$id=$_GET['disciplina'];
?>
<script src="jquery/jquery-1.7.2.js"></script>
<script src='jquery/jquery.cycle.all.js'></script>
<style>

    #box{

z-index: 3;

}
    #box2{

z-index: 1;

}
    
    #jogo, #prev2,#nivel{
border-radius:5px;
margin-left: 10px;
margin-top: 10px;
-moz-border-radius:5px;
        box-shadow: 0 0px 5px 3px #ffffff;
        height: 60px;
        background-color: #6d6d6d;
        background-image: url('images/f.png');
     }
    #tamanho{
        width: 650px;
        min-height: 400px;
}
  
   
</style>



<script type="text/javascript">
     $(document).ready(function() {
       $('#prev2').hide();
       var jogo=0;
        var nivel=0;
      $("#box2").hide();
        //$('#prev2').show();

        $('.jogo').click(function(){
            jogo=$(this).val();
           

       $('#prev2').show();
        $('#box').slideUp();
        $("#box2").show();
        
      
       
  });
  $(".nivel").click(function(){

        nivel=$(this).val();
          var novaURL = "saber.php?treino="+jogo+"&nivel="+nivel;
$(window.document.location).attr('href',novaURL);

  });
$('#prev2').click(function(){

      $('#prev2').hide();
  $('#box2').hide();
$('#box').slideDown();

});

       
       
    });
</script>
 <body style=" ">
     
 
<div id="tamanho">
<div id="box">
<?php $sq_jogo=mysql_query("SELECT * FROM jogo where iddisciplina=$id and ativo=1");
while($treino=mysql_fetch_array($sq_jogo)){
    echo"<button id='jogo' class='jogo' value='".$treino['idjogo']."'>".$treino['nome']."</button>";

}
?>
</div> 
       
<div id="box2">
    <button id="nivel" class="nivel" value="1">Fácil</button>
    <button id="nivel" class="nivel" value="2">Normal</button>
    <button id="nivel" class="nivel" value="3">Difícil</button>
     </div> 
      <br>
    <button  id='prev2'>Voltar</button>
</div>
       
