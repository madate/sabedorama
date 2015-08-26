<?php
require_once 'conection.php';
?>


<script src='jquery/jquery-1.7.2.js'></script>
<script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>
<script src="jquery/jquery.maskedinput-1.3.js"></script>

<style>
    #ajax_form label.error {
top:70px;
     float: left;
   z-index: 100;
   font-style: italic;
   color: red

}
</style>
 <script>
           $(document).ready(function(){
          $('#form').validate({

            rules: {
                nome:{required:true, remote:"conferedis.php"
            }
                
            },
            messages: {

                nome: { required: 'Preencha a pergunta!',

                remote:jQuery.format("<img src=\'images/uncheck.png\' width=\'18px\' heigth=\'18px\'/>&nbsp; Oferta: <b>{0}</b> já está cadastrada ")
                

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

                          $("input[name='nome']").val( '' );
                          $("input[name='nome']").focus();
            

                    }

                });

                return false;
            }


        });
    });
</script>
 <script>
           $(document).ready(function(){
          $('#form_ed').validate({

            rules: {
                nome:{required:true
            }
                
            },
            messages: {

                nome: { required: 'Preencha a Disciplina!',

                remote:jQuery.format("<img src=\'images/uncheck.png\' width=\'18px\' heigth=\'18px\'/>&nbsp; Oferta: <b>{0}</b> já está cadastrada ")
                

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

                          $("input[name='nome']").val( '' );
                          $("input[name='nome']").focus();
            

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
        $('.tgl').before('<span  style="cursor:pointer"><h3>Cadastrar Disciplina</h3></span>');
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
        $('.tgl2').before('<span  style="cursor:pointer"><h3>Editar Disciplina</h3></span>');
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
<script>
            $(function(){
$('#dis_ed').change(function(){
    
    var dis=$('#dis_ed').serialize();
    $.ajax({
      type: 'post',
      data: dis,
      url:'selecttreino.php',
      success: function(retorno){
          //alert(retorno);
        $('#dis_ret').html(retorno);
      }
       })
})
});
</script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<div style="width: 600px; height: 400px">
    <div id='box-toggle' class="square_grey">
<div class="tgl">
    

    <form action="#" method="post" id="form" name="form">
	
            Disciplina:<input type="text" size="40" name="nome" id="nome" /><br>
            <input type="hidden"  name="cad" value="1" />
            <input  type="submit" value="Cadastrar" class="btn btn-success"/><input style="margin-left:8px" class="btn" type="reset" value="Limpar"/>
		
	</form>
 
</div>
</div>
    <div id='box-toggle2' class="square_blue">
<div class="tgl2">
    

    <form action="#" method="post" id="form_ed" name="form">
	
        <select id="dis_ed" name="porra">
                <option>Escolha a disciplina</option>
            <?php  
            $disciplina=  mysql_query("SELECT * FROM disciplina");
            while($dis=  mysql_fetch_array($disciplina)){
                
               echo"<option value='".$dis['iddisciplina']."'>".$dis['nome']."</option>";
            }
            ?>
        </select>
        <input type="hidden" name="cad" value="9"/>
                <div id="dis_ret"></div>	
	</form>
 
</div>
</div>
<div id="resposta" class="alert alert-success"></div>

</div>