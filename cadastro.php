<?php
require_once 'header.php';
?>
               <script type="text/javascript" src="jquery/jquery.pstrength-min.1.2.js"></script>
      
        <script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>
        <script src="jquery/jquery.maskedinput-1.3.js"></script>
    </head>
    <body bgcolor="#666666">


        <script>

            $(document).ready(function(){

                jQuery.validator.addMethod("dateBR", function(value, element) {
                    //contando chars
                    if(value.length!=10) return false;
                    // verificando data
                    var data        = value;
                    var dia         = data.substr(0,2);
                    var barra1      = data.substr(2,1);
                    var mes         = data.substr(3,2);
                    var barra2      = data.substr(5,1);
                    var ano         = data.substr(6,4);
                    if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
                    if((mes==4||mes==6||mes==9||mes==11)&&dia==31)return false;
                    if(mes==2 && (dia>29||(dia==29&&ano%4!=0)))return false;
                    if(ano < 1900)return false;
                    return true;
                }, "Informe uma data válida");  // Mensagem padrão

                $('#form').validate({

                    rules: {
                        mail:{required:true, email:true,remote:"login.php"

                        },
                        nome:{
                            required: true
                        },
                        sexo:{required:true},
                        data:{
                            required: true, dateBR:true

                        },
                        senha: {
                            required: true,
                            minlength: 5
                        },
                        senha1: {
                            required: true,
                            minlength: 5,
                            equalTo: "#senha"
                        },
                        nome:{
                            required: true
                        }

                    },
                    messages: {
                        sexo:{required:"Preencha o sexo!"},
                        nome:{required:"Preencha o seu nome"},
                        data:{required:"Preencha a data!"},
                        senha: {
                            required: "Preencha a senha",
                            minlength: "No minimo de 5 caracteres"
                        },
                        senha1: {
                            required: "Confirme a senha",
                            minlength: "No minimo de 5 caracteres",
                            equalTo: "Entre com a mesma senha!"
                        },
                        mail: { required: 'Preencha o login!',
                            email:"Login inválido",
                            remote:jQuery.format("e-mail já cadastrado ")

                        }



                    },

                    submitHandler: function( form ){
                        var dados = $( form ).serialize();

                        $.ajax({
                            type: "POST",
                            url: "cadastrar_usuario.php",
                            data: dados,
                            success: function( data )
                            {
                                $('#resposta').html("Cadastro realizado com sucesso! Você será redirecionado em instantes.");
                                
                                  setTimeout( function() {
     
	 $.post("login.php",{cadastro:data},
  function(retorno){
    $("#resposta").html(retorno);
    
  }, "html");	
	}, 3000 );


                            }

                        });

                        return false;
                    }


                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $('#senha').pstrength();
            });
        </script>
        <script>
            $(document).ready(function(){
                $("#data").mask("99/99/9999");

            });

        </script>
        <style>
            #form label.error {
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
        <div style="width: 450px; margin: 0 auto" >
        <h2 style="text-align: center;width: 400px; margin: 0 auto" class="label label-important"> Faça seu cadastro!</h2>
        <br/>
        <form method="post" action="#" id="form">
            <table align="center" style="font-family: Gill, Helvetica, sans-serif; font-weight: bold; color: gray">
                
                <tr><td>Nome:</td><td><input type="text" name="nome" id="nome"size="40"/></td></tr>
                <tr><td>E-mail:</td><td><input type="text" name="mail" id="mail" size="40"/></td></tr>
                <tr><td>Sexo</td><td><select  name="sexo" id="sexo" style="width: 220px">
                            <option ></option>
                            <option >Masculino</option>
                            <option >Feminino</option></select></td></tr>

                <tr><td>Data nascimento:</td><td><input type="text" name="data" id="data"size="40"/></td></tr>
                <tr><td>Senha:</td><td><input type="password" name="senha" id="senha"size="40"/></td></tr>
                <tr><td>Confirme a senha:</td><td><input type="password" name="senha1" id="senha1" size="40"/></td></tr>
                <tr><td colspan="2"><input class="btn" type="submit" value="Cadastrar"/> 
                        <button type="reset"class="btn" >Limpar</button></td></tr>
            </table>
        </form>
        <div id="resposta" class="alert alert-success" style="font-size: 16px; text-align: center"></div>
        </div>
    <?php
require_once 'footer.php';
?>
     


