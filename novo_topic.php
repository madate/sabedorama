<?php
session_start();
require_once 'sesao.php';
require_once 'conection.php';
?>
<script src='jquery/jquery-1.7.2.js'></script>
<script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>
<script src="jquery/jquery.maskedinput-1.3.js"></script>
<style>
    #form label.error {

     float: right;
     margin-right: 200px;
   z-index: 100;
   font-style: italic;
   color: red
   
}
</style>

<script>
           $(document).ready(function(){
        

            $('#form').validate({

            rules: {
                titulo:{required:true, maxlength: 200
            },
                
                msg:{required:true, maxlength:5000}
            },
            messages: {

                titulo: { required: 'Preencha o título!', maxlength:'Máximo de 200 caracteres!'
               },

                 msg:{required: 'Preencha a mensagem!', maxlength:'Máximo de 5000 caracteres!'}

            },

            submitHandler: function( form ){
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "cad_topico.php",
                    data: dados,
                    success: function( data )
                    {
                        $('#result').addClass('alert alert-success');   
                     $('#result').html(data);   
                     $('#form')[0].reset();  


                    }

                });

                return false;
            }


        });
    });
</script>

<div style="background-color: #949494; border: 2px solid #000088; padding: 6px; box-shadow: 1px 1px 3px #666; width: 600px">
<form method="post" action="#" id="form">
    
    <input placeholder="Titulo" typs="text" name="titulo" id="titulo"class="input input-xxlarge"><br><br>
    <textarea placeholder="Corpo da mensagem" class="input input-xxlarge" id="msg" name="msg"></textarea>
    <input type="hidden" name="tipo" value="1"/>
    <br>
    <br>
    <input  type="submit" value="Cadastrar" class="btn btn-success" ><input style="margin-left: 8px" class="btn" type="reset" value="Limpar"/>
    
</form>
    <div id="result"></div>
</div>