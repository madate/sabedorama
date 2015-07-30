<?php
require_once 'conection.php';
$sq_disciplina=mysql_query("SELECT * FROM disciplina order by nome");
?>

<script src='jquery/jquery-1.7.2.js'></script>
<script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>
<script src="jquery/jquery.maskedinput-1.3.js"></script>

<script>
            $(function(){
$('#disciplina').change(function(){
    var dis=$('#disciplina').serialize();
    $.ajax({
      type: 'post',
      data: dis,
      url:'selectjogo.php',
      success: function(retorno){
        $('#jogo').html(retorno);
      }
       })
})
});
</script>
<script>
            $(function(){
$('#disciplina1').change(function(){
    var dis=$('#disciplina1').serialize();
    $.ajax({
      type: 'post',
      data: dis,
      url:'selectjogo.php',
      success: function(retorno){
        $('#jogo1').html(retorno);
      }
       })
})
});
</script>
   	<script>
            $(function(){
$('#jogo').change(function(){
    var dis=$('#jogo').serialize();
    $.ajax({
      type: 'post',
      data: dis,
      url:'tabuleiro_cad.php',
      success: function(retorno){
        $('#tabuleiro').html(retorno);
      }
       })
})
});
</script>
<style>
    #form_r label.error {

     float: left;
   z-index: 100;
   font-style: italic;
   color: red
   
}
</style>
<script>
 $(document).ready(function(){   
$('#imp').click(function(){
 $('#import').animate({ opacity:1.0}, 700);
});
});
</script>
 <script>
    $(document).ready(function(){
		$("#linha").mask("99");
		$("#coluna").mask("9");
	});

</script>
<script>
           $(document).ready(function(){
          $('#form_').validate({

            rules: {
                jogo:{required:true, remote:"conferedis.php"
            },
            certa:{
                required: true
            }

            },
            messages: {

                jogo: { required: 'Preencha o jogo!',

                remote:jQuery.format("<img src=\'images/uncheck.png\' width=\'18px\' heigth=\'18px\'/>&nbsp; Jogo: <b>{0}</b> já está cadastrada ")
           },
                disciplina:{
                    required:"Escolha uma disciplina"
                }


            },

            submitHandler: function( form ){
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "conferedis.php",
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
<script type="text/javascript">

    $(document).ready(function(){

	jQuery.validator.addMethod("linha", function( value, element,param ) {
		return value < param;
	}, "Deve ser até 24.");
	jQuery.validator.addMethod("jogo", function( value, element,param ) {
		return value != param;
	}, "Mude a opção.");
	jQuery.validator.addMethod("col", function( value, element,param ) {
		return value < param;
	}, "Deve ser até 7.");


        $('#form_r').validate({

            rules: {
                pergunta:{required:true
            },
                jogo: { required: true, jogo:'Escolha um jogo'
                   } ,
                certa: { required: true
                   } ,
                errada:{required:true
            },
                indiferente:{required:true
            },
                linha:{required:true,linha:25
            },
                coluna:{required:true,col:8}
            },
            messages: {

                pergunta: { required: 'Preencha a pergunta!'
               },

                certa: { required: 'Preencha e resposta certa!'},
                jogo: { required: 'Escolha um jogo!'},
                errada: { required: 'Preencha e resposta errada!'},
                indiferente: { required: 'Preencha e resposta indiferente!'},
                linha: { required: 'Preencha a linha!'},
                 coluna:{required:'Preencha a coluna!'}

            },

            submitHandler: function( form ){
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "cad_pergunta.php",
                    data: dados,
                    success: function( data )
                    {
                        var dis=$('#jogo').val();
                        alert( data);
                        $.post("tabuleiro_cad.php",{jogo: dis},
  function(retorno){
    $('#tabuleiro').html(retorno);
  }, "html");

                          $("input[name='pergunta']").val( '' );
                          $("input[name='pergunta']").focus();
            $("input[name='certa']").val( '' );
            $("input[name='errada']").val( '' );
            $("input[name='indiferente']").val( '' );
            $("input[name='linha']").val( '' );
            $("input[name='coluna']").val( '' );

                    }

                });

                return false;
            }


        });
    });
</script>
<div
<div style="width: 400px;  margin-left: 30px">
<form method="post" action="#" id="form_r">
    <table width="80%">
        <tr><td colspan="2">
    <select name="disciplina" id="disciplina">
        <option>Escolha a Disciplina</option>
        <?php
        while($disciplina=mysql_fetch_array($sq_disciplina)){
            echo"<option value='".$disciplina['iddisciplina']."'>".$disciplina['nome']."</option>";
        }
        ?>
    </select>
            </td><td colspan="2">
    
    <select name="jogo" id='jogo'>
        <option >Escolha um jogo</option>
        
    </select>
            </td>
        </tr>
        <tr>
            <td >Pergunta:</td><td colspan="3"><input type="text" size="70" name="pergunta" /></td>
        </tr>
        <tr>
            <td >Certa:</td><td colspan="3"><input type="text" size="70" name="certa" /></td>
        </tr>
        <tr>
           <td  >Indiferente:</td><td colspan="3"><input type="text" size="70" name="indiferente" /></td>   
        </tr>
        <tr>
            <td >Errada:</td><td colspan="3"><input type="text" size="70" name="errada" /></td>
            
           
           
        </tr>
       
         <tr >

                    <td colspan="4" ><input  type="submit" value="Cadastrar" ><input class="sform" type="reset" value="Limpar"/></td>
         </tr>

    </table>
</form>
<button id="imp" >Importar arquivo TXT</button>
<div id="import" style="width: 400px;  margin-left: 30px; margin-top: 20px; opacity:0; color:black">
    <form method="post" action="arquivo.php" enctype="multipart/form-data">
   
    <select name="disciplina1" id="disciplina1">
        <option>Escolha a Disciplina</option>
        <?php
        $sq_disciplina1=mysql_query("SELECT * FROM disciplina order by nome");
        while($disciplina1=mysql_fetch_array($sq_disciplina1)){
            echo"<option value='".$disciplina1['iddisciplina']."'>".$disciplina1['nome']."</option>";
        }
        ?>
    </select>
            
    
    <select name="jogo1" id='jogo1'>
        <option >Escolha um jogo</option>
        
    </select>
                <input type="file" name="arquivo" id="arquivo"/>
                <input type="submit" value="Importar"/>
</div>
</div>

<div  id="tabuleiro">
    
   
</div>

<div  id="resposta"  title='Alterar pergunta' style="width: 400px; float: left; margin-left: 30px; margin-top: 20px"></div>



