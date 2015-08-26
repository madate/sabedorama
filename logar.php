
<script src="jquery/jquery-1.5.1.js"></script>    

<script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>
<script>
  $(document).ready(function(){
      
        $("#reset_senha").hide();   
        $("#chama_reset").click(function(){
            
        $("#log").hide("slow");
        $("#reset_senha").show("slow");
        });
      
 
$('#cform').validate({

            rules: {
                login:{required:true, email:true,remote:"login.php"
            },
                senha: { required: true
                   }
            },
            messages: {

                login: { required: 'Preencha o login!', 
                    email:"Login inválido", 
                    remote:jQuery.format("Login não encontrado ")
                
               },

                senha: { required: 'Preencha a senha'}
                

            },

            submitHandler: function( form ){
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: dados,
                    success: function( data )
                    {
                           $('#erro').addClass('alert alert-danger');
                        $('#erro').html(data);
                       

                    }

                });

                return false;
            }


        });
$('#reset_form').validate({

            rules: {
                login:{required:true, email:true,remote:"login.php"
            }
            },
            messages: {

                login: { required: 'Preencha o login!', 
                    email:"Login inválido", 
                    remote:jQuery.format("Login não encontrado ")
                
               }
                

            },

            submitHandler: function( form ){
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "recupera_senha.php",
                    data: dados,
                    success: function( data )
                    {
                           $('#erro2').addClass('alert alert-danger');
                        $('#erro2').html(data);
                       

                    }

                });

                return false;
            }


        });
        });

</script>
<style>
    #cform label.error {
    z-index: 100;
  padding: 2px 1px 2px 2px;
  width: 200px;
  
    margin-bottom: 3px;
  color: #c09853;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
  background-color: #fcf8e3;
  border: 1px solid #fbeed5;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
}
</style>
<div istyle="width: 300px; height: 300px">
    <div id="log">
<form action="#"  name="cform" id="cform" method="post">
    <p style="text-align: center" class="label label-info">Faça login e se divirta!</p>
                
                   
                    <input id="login" placeholder="Preencha o Login" type="text" value="" name="login" /></p>
                    <input id="cad" type="hidden" value="1" name="cad" /></p>
                  
                    <input id="senha" placeholder="Preencha a Senha" type="password" value="" name="senha" /></p>
                    
                    
               
                  <button type="submit" class="btn btn-success">Logar</button>
        <button type="reset" class="btn">Limpar</button>
            </form>
<label id="erro" ></label>
<a href="#" id="chama_reset">Resetar sua senha</a>
    <label>Ainda não tem cadastro? Faça agora é Grátis! </label>
    <a href="cadastro.php" class="btn "><i class=" icon-thumbs-up"></i>Cadastrar!</a>
</div>
    <div id="reset_senha">
       <form action="#"  name="reset_form" id="reset_form" method="post">
    <p style="text-align: center" class="label label-info">Resetar sua senha</p>
                
                   
                    <input id="login" placeholder="Preencha o Login" type="text" value="" name="login" /></p>
                    <input id="cad" type="hidden" value="reset" name="reset" /></p>
                  
                    
                    
                    
               
                  <button type="submit" class="btn btn-success">Resetar Senha</button>
        <button type="reset" class="btn">Limpar</button>
            </form>
<label id="erro2" ></label>
    </div>
</div>
