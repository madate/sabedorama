<div style="width: 370px; padding: 20px; height: 380px">
    <script src="jquery/jquery-1.5.1.js"></script>    
<script src="jquery/jquery.maskedinput-1.3.js"></script>

<script src="jquery/jquery-validation-1.9.0/jquery.validate.js"></script>
<script type="text/javascript">  
        
    $(document).ready(function(){ 
       
        $.validator.addMethod("assunto", function(value, element) {
   return $('#assunto').val() != "Assunto do contato"
}, "Escolha um assunto!");

        $('#form').validate({ 
           
            rules: {  
                nome:{required:true,
            minlength: 5 
           
            },
                msg: { required: true
                }, 
                mail: { required: true, email:true
                }, 
                assunto: { assunto: true
                } 
               
            },
            messages: {  
               
                nome: { required: 'Preencha o seu nome !',
                minlength:'Minímo de 4 caracteres!'
             
                },  
                 mail: { required: 'Preencha o e-mail', email:'E-mail inválido'
                  },
                
                msg: { required: 'Preencha uma mensagem!'
                  }
            }, 
            
            submitHandler: function( form ){  
               
                var dados = $( form ).serialize();  
  
                $.ajax({  
                    type: "POST",  
                    url: "mail.php",  
                    data: dados,  
                    success: function(data)  
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
    
    <p style="text-align: center" class="label label-warning">Entre em contato com a Equipe do Sabedorama</p>
    <form action="#" method="post" id="form" class="form-horizontal">
        <br/>
        <input type="text" placeholder="Nome" name="nome" id="nome" class="span4" /><br/><br/>
    <input type="text" placeholder="E-mail" name="mail" id="mail"  class="span4"/><br/><br/>
    <select name="assunto" id="assunto"  class="span4">
        <option>Assunto do contato</option>
        <option>Sugestão</option>
        <option>Reclamação</option>
        <option>Parcerias</option>
        <option>Outros</option>
        
    </select>
    <br/><br/>
    <textarea id="msg" name="msg" cols="10" class="span4">

    </textarea>
    <br>
    <br>
    <button type="submit" class="btn btn-info">Enviar</button>
    <button type="reset" class="btn">Limpar</button>
    </form>
    <div id="result"></div>
</div>
