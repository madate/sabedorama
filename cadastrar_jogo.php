<?php
require_once 'conection.php';


?>


<script src='jquery/jquery-1.7.2.js'></script>
<script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>
<script src="jquery/jquery.maskedinput-1.3.js"></script>
<script src="js/bootstrap.js"></script>
   
    <link href="css/bootstrap.css" rel="stylesheet">
<script>
    $(document).ready(function(){
		$("#facil").mask("99");
		$("#normal").mask("99");
		$("#dificil").mask("99");
	});

</script>

<script>
            $(function(){
$('#disciplina_ed').change(function(){
    var dis=$('#disciplina_ed').serialize();
    $.ajax({
      type: 'post',
      data: dis,
      url:'selectjogo.php',
      success: function(retorno){
        $('#jogo_ed').html(retorno);
      }
       })
})
});
</script>
<script>
            $(function(){
$('#jogo_ed').change(function(){
    var dis=$('#jogo_ed').serialize();
    $.ajax({
      type: 'post',
      data: dis,
      url:'selectjogo.php',
      success: function(retorno){
          
        $('#ed').html(retorno);
      }
       })
})
});
</script>
<style>
    #form_i label.error {
top:70px;
     float: left;
   z-index: 100;
   
   font-style: italic;
   color: red

}
</style>
 <script>
           $(document).ready(function(){
          $('#form_i').validate({

            rules: {
                jogo:{required:true, remote:"conferedis.php"
            },
                facil:{required:true
            },
                normal:{required:true
            },
                dificil:{required:true
            },
            disciplina:{
                required: true
            }

            },
            messages: {

                jogo: { required: 'Preencha o jogo!',

                remote:jQuery.format("<img src=\'images/uncheck.png\' width=\'18px\' heigth=\'18px\'/>&nbsp; Jogo: <b>{0}</b> já está cadastrada ")
           },
                disciplina:{
                    required:"Escolha uma disciplina"
                },
                facil:{
                    required:"Insira um tempo em segundos"
                },
                normal:{
                    required:"Insira um tempo em segundos"
                },
                dificil:{
                    required:"Insira um tempo em segundos"
                }


            },

            submitHandler: function( form ){
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "cad_jogo.php",
                    data: dados,
                    success: function( data )
                    {
                        $('#resposta').html(data);

                          $("input[name='jogo']").val( '' );
                          $("input[name='jogo']").focus();


                    }

                });

                return false;
            }


        });
    });
</script>
 <script>
           $(document).ready(function(){
          $('#form_jo').validate({


            submitHandler: function( form ){
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "conferedis.php",
                    data: dados,
                    success: function( data )
                    {
                        $('#resposta').html(data);

                          $("select[name='disciplina_ed']").val( '' );
                          $("select[name='jogo_ed']").val( '' );
                          $('#ed').html('');


                    }

                });

                return false;
            }


        });
    });
</script>

<script type="text/javascript">
    jQuery.fn.toggleText = function(a,b) {
        return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
    }

    $(document).ready(function(){
        $('.tgl').before('<span  style="font-size:20px; color:#2582A4;cursor: pointer; margin-left: 5px">Cadastrar Jogo</span>');
        $('.tgl').css('display', 'none')
        $('span', '#box-toggle').click(function() {
            $(this).next().slideToggle('slow')
            .siblings('.tgl:visible').slideToggle('fast');

            $(this).toggleI('+','-')
            .siblings('span').next('.tgl:visible').prev()
            .toggleText('+','-')
        });
        
    })
</script>
<script type="text/javascript">
    jQuery.fn.toggleText = function(a,b) {
        return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
    }

    $(document).ready(function(){
        $('.tgl2').before('<span  style="cursor: pointer"><h3>Alterar Jogo</h3></span>');
        $('.tgl2').css('display', 'none')
        $('span', '#box-toggle2').click(function() {
            $(this).next().slideToggle('slow')
            .siblings('.tgl2:visible').slideToggle('fast');

            $(this).toggleI('+','-')
            .siblings('span').next('.tgl2:visible').prev()
            .toggleText('+','-')
        });
        
    })
</script>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<div style="width: 400px; height: 650px">
 <div id='box-toggle' class="square_blue">
<div class="tgl" >


    <form action="#" method="post" id="form_i" name="form">
        <fieldset><table><tr>
            <td>Disciplina:</td><td><select name="disciplina">
                <option></option>
                <?php
                    $sq_disciplina=mysql_query("SELECT * FROM disciplina order by nome");
                     while($disciplina=mysql_fetch_array($sq_disciplina)){
            echo"<option value='".$disciplina['iddisciplina']."'>".$disciplina['nome']."</option>";
        }
                ?>
            </select></td>
            <tr>
                <td>Status</td>
                <td><select name="status">
                        
                      
                        <option>Free</option>
                        <option>Logado</option>
                    </select></td>
            </tr>
            <tr>
            <td>Nome:</td><td> <input type="text" name="jogo" id="jogo" /></td></tr>
           <tr><td> Fácil: </td><td><input type="text" name="facil" id="facil" size="2" /></td></tr>
            <tr><td>Normal:</td> <td><input type="text" name="normal" id="normal" size="2"/></td></tr>
            <tr><td>Difícil: </td><td><input type="text" name="dificil" id="dificil" size="2" /></td></tr>
            <input type="hidden" value="5" nome="cad"/>
            <tr><td colspan="2"><input type="submit" value="Cadastrar" class="btn"/></td></tr>
            </table>
		</fieldset>
	</form>

</div>
</div>

    <div id='box-toggle2' class="square_grey">
<div class="tgl2" >
   
   <form action="#" method="post" id="form_jo" name="form_jo">
	<fieldset>
            <table><tr>
            <td>Disciplina:</td><td><select name="disciplina_ed" id="disciplina_ed">
        <option>Escolha a Disciplina</option>
        <?php
        $sq_disciplina=mysql_query("SELECT * FROM disciplina order by nome");
        while($disciplina=mysql_fetch_array($sq_disciplina)){
            echo"<option value='".$disciplina['iddisciplina']."'>".$disciplina['nome']."</option>";
        }
        ?>
  
            </select></td></tr>
<tr><td>Jogo:</td><td>
          <select name="jogo_ed" id='jogo_ed'>
        <option >Escolha um jogo</option>

    </select>
</td></tr></table>
            
           <table id="ed" >

           </table>
            
		</fieldset>
	</form>



</div>
</div>
        
<div id="resposta" class="alert alert-success"></div>

