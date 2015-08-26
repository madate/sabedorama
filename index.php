<?php
require_once 'header.php';
//require_once 'conection.php';
?>

<script>
    $(document).ready(function(){
        $("#logar").colorbox();
        $("#regras").colorbox();
        $("#contato").colorbox();
        $("#rank").colorbox();
        $("#empresa").colorbox();
        $("#disciplina").colorbox();
        $("#manter_jogo").colorbox();
        $("#perguntas").colorbox();


        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){
            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
            return false;
        });
        $("#jogar").click(function(){
            var novaURL = "escolhe.php ";
            $(window.document.location).attr('href',novaURL);
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
                        $('#erro').html(data);

                    }

                });

                return false;
            }


        });
    });

</script>

<p class="label label-inverse" style="text-align: center">Parceiros</p>
<div class="row">
    
    <div class="span3 ">
        
        <label>Parceiro 1</label>
        
        
    </div>
    <div class="span3">
        
        <label>Parceiro 2</label>
        
        
    </div>
    <div class="span3">
        
        <label>Parceiro 3</label>
        
        
    </div>
    <div class="span3">
        
        <label>Parceiro 4</label>
        
        
    </div>
    </div>
<div class="row">
    <div class="span3">
        <div class="square_grey">
            <p style="text-align: center" class="label label-warning">Jogar</p>
            <img src="images/Joystick-.jpg" width="75px" height="73px" style="float: left; margin-right: 5px"/>
            O Jogo para melhorar os seus conhecimentos em várias áreas de conhecimento
            <br>
            <br>
            <?php echo $butao; ?>
            <br>
            <br>
            <button id='regras' class='btn btn-warning' href='ajax.html'> Regras do jogo</button>
        </div>
    </div>
    <div class="span3"><div class="square_grey">
            <p style="text-align: center" class="label label-info">Contato</p> 

            <img src="images/cont.jpg" width="75px" height="73px" style="float: left; margin-right: 5px"/>
            Faça contato com a eqipe do Sabedorama, tire suas dúvidas, faça sugestões.
            <p>Coloque o Sabedorama na sua empresa, Site, Escola ou Igreja nos pergunte como.</p>
            <br>
            <a href="contato.php" id="contato" class="btn btn-large btn-success" >Contato!</a>
            <a href="forum.php"  class="btn btn-large btn-success" >Comunidade!</a>
        </div></div>
    <div class="span3"><div class="square_grey">
            <p style="text-align: center" class="label label-success">Ranking</p> 
            <img src="images/trof.jpg" width="75px" height="73px" style="float: left; margin-right: 5px"/>
            Veja os campeões em cada área de conhecimento, divididos por níves de de dificuldade.
            <p>Seja também um campeão faça a maior quantidade de pontos no menor tempo!</p>
            <br/>
             <a href="ranking_geral.php" id="rank" class="btn btn-large btn-warning" >Ranking</a>
        </div></div>
    <div class="span3"><div class="square_grey">
 <p style="text-align: center" class="label label label-inverse"">A Empresa</p> 
 <img src="images/cron.png" width="60px" height="75px" style="float: left; margin-right: 5px"/>
           <p>Conheça o Sabedorama, e seus serviços e projetos desenvolvidos para aprendizado de forma divertida.
           </p><br/>
            <a href="empresa.php" id="empresa" class="btn btn-large btn-inverse" >A Empresa</a>
        </div></div>
</div>
<?php
if (isset($_SESSION['sabedorama'])) {
    $id = $_SESSION['sabedorama'];

    $sq_perfil = mysql_query("SELECT admin from jogador where idjogador=$id");
    $admin = mysql_result($sq_perfil, 0);
    if ($admin == 1) {
        echo'
            <br><div class="row">
        <div class="span12">
        
        <div class="square_blue">
        
        <p style="text-align:center" class="label label-important"> Área Administrativa</p>
<br>        
<a id="disciplina" href="cadastrar_disciplina.php" class="btn btn-large" title="Manter Disciplinas">Manter Disciplinas</a>
        <a id="manter_jogo" href="cadastrar_treino.php" class="btn btn-large" title="Manter Jogo">Manter Jogos</a>
        <a id="perguntas" href="cadastrar_perguntas.php" class="btn btn-large" title="Manter Perguntas">Manter Perguntas</a>

         </div>
         </div>
        </div>';
    }
}
require_once 'footer.php';
?>
