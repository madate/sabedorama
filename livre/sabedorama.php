<?php session_start();

require_once 'conection.php';
 if(isset($_SESSION['sabedorama'])){
     $butao="<button id='jogar' class='btn btn-large btn-info' href='escolhe.php'> Jogar</button>";
     $sq_nome=mysql_query("SELECT nome FROM jogador WHERE idjogador='".$_SESSION['sabedorama']."'");
                            $nome=mysql_result($sq_nome,0);
     $bem="Bem vindo $nome <a style='margin-left:8px' class='close2' title='Sair do sistema' href='sair.php' >&times;</a>";
 }else{$bem=''; $butao="<button id='logar' class='btn btn-large btn-danger' href='logar.php'>Faça Login</button>
     ou <a href='cadastro.php' class='btn btn-large btn-success'><i class='icon-thumbs-up'></i>Cadastrar!</a>";}

?>
<html lang="br">
    <head>

        <meta charset="utf-8">
        <title>Bem vindo ao Sabedorama</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Tito Paulo">
        <script src="../jquery/jquery-1.7.2.js"></script>



        <script src="../js/bootstrap.js"></script>


        <link href="../css/bootstrap.css" rel="stylesheet">
  
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
            }
        </style>


        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

                    </a>
                    <a class="brand" href="../index.php">Sabedorama</a>

 <span style="color: #e9322d ; font-size: 18px; float: right; margin-top: 8px;margin-right: 20px;font-weight: bold; text-shadow: 0.5px 0.5px 2px #CFCFCF;">
            <?php echo$bem;?>
           </span>
                </div>
            </div>
        </div>﻿
        <br>
       
        <div id="ag" >Aguarde carregando dados <img src="../images/loading.gif" /></div>
        
        <?php
        if (isset($_POST['jogo'])) {
            $jogo = $_POST['jogo'];
            $nivel = $_POST['nivel'];
            require_once 'conection.php';
        } else {

            echo " <script>window.parent.location='../index.php'</script>";
        }
        if ($nivel == 1) {
            $nive = "facil";
        }
        if ($nivel == 2) {
            $nive = "normal";
        }
        if ($nivel == 3) {
            $nive = "dificil";
        }
        $sq_nivel = mysql_query("SELECT $nive from jogo where idjogo=$jogo");
        $tempo_de_jogo = mysql_result($sq_nivel, 0);
        $sq_pergunta = mysql_query("SELECT pergunta from perguntas where jogo_idjogo=$jogo order by idperguntas ");
        $sq_certo = mysql_query("SELECT certa from perguntas where jogo_idjogo=$jogo");
        $sq_errado = mysql_query("SELECT errada from perguntas where jogo_idjogo=$jogo");
        $sq_indi = mysql_query("SELECT indiferente from perguntas where jogo_idjogo=$jogo");


//echo $bot;
        ?>


        <script src='../jquery/jquery-1.7.2.js'></script>
        <script src='../jquery/jquery.random.js'></script>
        <script src="../js/bootstrap.js"></script>

        <script src="../colorbox/colorbox/jquery.colorbox.js"></script>
        <link rel="stylesheet" href="../colorbox/example5/colorbox.css" />
         <script>
            $(function() {
                
           /*  setInterval(function() {

				$( ".pisca" ).animate({
					 opacity:1
				}, 400, function(){$( ".pisca" ).animate({
					 opacity:0},400);}).delay(200);


    },1000);    
            */
        $("#ag").hide();
                ////////////////////////////////////Variaveis globais/////////////////////////////////////]
        
                $("#load").show();
                var tempo=<?php echo $tempo_de_jogo; ?>;
                var tempo2=<?php echo $tempo_de_jogo; ?>;;
                var total=0;
                var controle=0;
                var score=0;
                var score2=1;
                var bonus=1;
                var certas=0;
                var erradas=0;
                var indife=0;
                var resposta;
                var pergunta=["inicio",<?php
        $i = 1;
        while ($per = mysql_fetch_array($sq_pergunta)) {
            echo"\"" . trim($per[0]) . "\",";
            $i++;
        }
        ?>];
                    var certa=["inicio",<?php
        $i = 1;
        while ($per = mysql_fetch_array($sq_certo)) {
            echo"\"" . trim($per[0]) . "\",";
            $i++;
        }
        ?>];
                        var errada=["inicio",<?php
        $i = 1;
        while ($per = mysql_fetch_array($sq_errado)) {
            echo"\"" . trim($per[0]) . "\",";
            $i++;
        }
        ?>];
                            var indiferente=["inicio",<?php
        $i = 1;
        while ($per = mysql_fetch_array($sq_indi)) {
            echo"\"" . trim($per[0]) . "\",";
            $i++;
        }
        ?>];var posicao= $.randomBetween(1,7);
                        
                                //
                                //////////////////////////////////////////////////////////////////////////////////////
                                $("#load").hide();                 
                                /////////////////////////////////////Intervalo de tempo////////////////////////////////////////////////////
                                $('#tempo').html(tempo2);
                                setInterval(function() {
                                    tempo2--;
                                    if(tempo2==0){
                                        bonus=bonus-1;
                                        if(bonus==0){bonus=1;}

                                        $('#'+posicao).css("backgroundColor", "#cccccc");
                                        $('#'+posicao).removeClass("animated flash ");
                                        $("#img").html("<img src='../images/Hglass.gif' width='60px' heigth='60px'/>");
                                        controle++;
                                        if(controle==1){
                                            if(posicao==1){posicao=posicao+6}
                                            else if(posicao==8){posicao=posicao+6}
                                            else if(posicao==15){posicao=posicao+6}
                                            else if(posicao==22){posicao=posicao+6}
                                            else if(posicao==29){posicao=posicao+6}
                                            else if(posicao==36){posicao=posicao+6}
                                            else if(posicao==43){posicao=posicao+6}
                                            else if(posicao==50){posicao=posicao+6}
                                            else if(posicao==57){posicao=posicao+6}
                                            else if(posicao==64){posicao=posicao+6}
                                            else if(posicao==71){posicao=posicao+6}
                                            else if(posicao==78){posicao=posicao+6}
                                            else if(posicao==85){posicao=posicao+6}
                                            else if(posicao==92){posicao=posicao+6}
                                            else if(posicao==99){posicao=posicao+6}
                                            else if(posicao==106){posicao=posicao+6}
                                            else if(posicao==113){posicao=posicao+6}
                                            else if(posicao==120){posicao=posicao+6}
                                            else if(posicao==127){posicao=posicao+6}
                                            else if(posicao==134){posicao=posicao+6}
                                            else if(posicao==141){posicao=posicao+6}
                                            else if(posicao==148){posicao=posicao+6}
                                            else if(posicao==155){posicao=posicao+6}
                                            else if(posicao==162){posicao=posicao+6}
                                            else{posicao--}
                                            if(posicao==0){posicao=1;}
                                        
                                        }else{  resposta=posicao-7; 
                                            if(resposta<0){}else{posicao=posicao-7}}
                                        if(posicao==0){posicao=1;}
                                    
                             
                                        //***********************************************Random e impressão das respostas novas***********************************
                                        var butns=["certo","errado","indiferente"];
                                        var tem=$.randomBetween(0,2);
                                        var tem2=$.randomBetween(0,2);
                                        var tem3=$.randomBetween(0,2);

                                        while(tem==tem2){ tem2=$.randomBetween(0,2);}
                                        while(tem3==tem2 || tem3==tem){ tem3=$.randomBetween(0,2);}

                                        $("#btn1").attr('value',butns[tem]);
                                        $("#btn2").attr('value',butns[tem2]);
                                        $("#btn3").attr('value',butns[tem3] );

                                        ///////////////fim Random dos butones//////////////////////////////////////////////////////////////////
                                        $('#'+posicao).css("backgroundColor", "green");
                                        $('#'+posicao).addClass("animated flash");
                                        $('#perguntas').html(pergunta[posicao]);
                                        $('#result').html(score);
                                        var t0= $("#btn1").val();
                                        if(t0=="certo"){$("#btn1").html(certa[posicao]);}
                                        if(t0=="errado"){$("#btn1").html(errada[posicao]);}
                                        if(t0=="indiferente"){$("#btn1").html(indiferente[posicao]);}
                                        var t1= $("#btn2").val();
                                        if(t1=="certo"){$("#btn2").html(certa[posicao]);}
                                        if(t1=="errado"){$("#btn2").html(errada[posicao]);}
                                        if(t1=="indiferente"){$("#btn2").html(indiferente[posicao]);}
                                        var t3= $("#btn3").val();
                                        if(t3=="certo"){$("#btn3").html(certa[posicao]);}
                                        if(t3=="errado"){$("#btn3").html(errada[posicao]);}
                                        if(t3=="indiferente"){$("#btn3").html(indiferente[posicao]);}

                                        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
               
                                        //função para mostrar o tempo atualizado e convertido//// 
                                        tempo2=tempo;
                                        total=total+tempo;
                                        var t= total/60;
                                        var minuto=parseInt(t);
                
                                        if(minuto<10){minuto="0"+minuto}
                                        var r= total%60;
                                        var seg=parseInt(r);
                                        if(seg<10){seg="0"+r}
         
                                        $("#total").html(minuto+":"+seg);
       
                                        ////////////////////////////////////////////////////
                                    }else{
                                        $('#tempo').html(tempo2);                       
                                    }
       
                                }, 1000 );
             
       
                                ///////////////Random dos butones//////////////////////////////////////////////////////////////////

                                var butns=["certo","errado","indiferente"];
                                var tem=$.randomBetween(0,2);
                                var tem2=$.randomBetween(0,2);
                                var tem3=$.randomBetween(0,2);

                                while(tem==tem2){ tem2=$.randomBetween(0,2);}
                                while(tem3==tem2 || tem3==tem){ tem3=$.randomBetween(0,2);}

                                $("#btn1").attr('value',butns[tem]);
                                $("#btn2").attr('value',butns[tem2]);
                                $("#btn3").attr('value',butns[tem3] );

                                ///////////////fim Random dos butones//////////////////////////////////////////////////////////////////


                        
                                $('#'+posicao).css("backgroundColor", "green");
                                $('#perguntas').html(pergunta[posicao]);
                                var t0= $("#btn1").val();
                                if(t0=="certo"){$("#btn1").html(certa[posicao]);}
                                if(t0=="errado"){$("#btn1").html(errada[posicao]);}
                                if(t0=="indiferente"){$("#btn1").html(indiferente[posicao]);}
                                var t1= $("#btn2").val();
                                if(t1=="certo"){$("#btn2").html(certa[posicao]);}
                                if(t1=="errado"){$("#btn2").html(errada[posicao]);}
                                if(t1=="indiferente"){$("#btn2").html(indiferente[posicao]);}
                                var t3= $("#btn3").val();
                                if(t3=="certo"){$("#btn3").html(certa[posicao]);}
                                if(t3=="errado"){$("#btn3").html(errada[posicao]);}
                                if(t3=="indiferente"){$("#btn3").html(indiferente[posicao]);}

                                //*****************************************Validação das respostas*****************************************************
                                //$("#tea").hide();
      
                        
                        
                                $(".btn").click(function(){
                                    var resposta= $(this).val();

                                    if(resposta=="certo"){
                                        certas++;
                                        bonus=bonus+1;
                                        score2=20;
                                      $('#'+posicao).css("backgroundColor", "#d5d0d0");
                                       $('#'+posicao).removeClass("animated flash ");
                                        if(posicao==7){posicao++}
                                        else if(posicao==14){posicao++}
                                        else if(posicao==21){posicao++}
                                        else if(posicao==28){posicao++}
                                        else if(posicao==35){posicao++}
                                        else if(posicao==42){posicao++}
                                        else if(posicao==49){posicao++}
                                        else if(posicao==56){posicao++}
                                        else if(posicao==63){posicao++}
                                        else if(posicao==70){posicao++}
                                        else if(posicao==77){posicao++}
                                        else if(posicao==84){posicao++}
                                        else if(posicao==91){posicao++}
                                        else if(posicao==98){posicao++}
                                        else if(posicao==105){posicao++}
                                        else if(posicao==112){posicao++}
                                        else if(posicao==119){posicao++}
                                        else if(posicao==126){posicao++}
                                        else if(posicao==133){posicao++}
                                        else if(posicao==140){posicao++}
                                        else if(posicao==147){posicao++}
                                        else if(posicao==154){posicao++}
                                        else if(posicao==161){posicao++}
                                        else if(posicao==168){posicao++}
                                        else{posicao=posicao+8}
                     
                                        $("#img").html("<img src='../images/ok.png' width='60px'  alt='Resultado' height='60px'/>");

                                        if(posicao>168){
                       
                                            $('#tey').animate({width:'100%', height:'100%'}, 700);
                                            //$("#tea").show();
                                            $.post("fim.php",{jogo:<?php echo"$jogo" ?>, nivel:<?php echo"$nivel" ?>,recorde:score,tempo:total,erros:erradas,certos:certas,indi:indife},
                                            function(retorno){
                                                $("#tre").html(retorno);
                                            }, "html");
                                            //$("#tre").load("inserir_horas.php");
                                            /*      
                            var novaURL = "fim.php?jogo=1&nivel=1&score="+score+"&tempo="+total+"&erros="+erradas+"&certos="+certas+"&indi="+indi;
        $(window.document.location).attr('href',novaURL);*/
                                        }
                                    }
                    

                                    //*****************************************Fim do Certo ********************************************************
                                    if(resposta=="errado"){

                                        erradas++;
                                        score2=1;
                                        score=score-(score*0.25);
                                        if(score<0){score=0;}
                                        bonus=1;
                                        $("#img").html("<img src='../images/nok.png' width='60px' alt='Resultado' height='60px'/>");
                                        $('#'+posicao).css("backgroundColor", "#d5d0d0");
                                         $('#'+posicao).removeClass('animated flash ');
                                        var resposta=posicao-7;
                                        if(resposta<0){}else{posicao=posicao-7}
                                        if(posicao==0){posicao=1;}
                                    }

                                    //****************************************************Fim do errado*********************************************
                                    if(resposta=="indiferente"){
                                        indife++;
                                        bonus=bonus-1;
                                        if(bonus==0){bonus=1;}
                                        score2=1;
                                        $("#img").html("<img src='../images/meio.png' width='60px' alt='Resultado' height='60px'/>");
                                        $('#'+posicao).css("backgroundColor", "#d5d0d0");
                                        $('#'+posicao).removeClass('animated flash ');
                                        if(posicao==1){posicao=posicao+6}
                                        else if(posicao==8){posicao=posicao+6}
                                        else if(posicao==15){posicao=posicao+6}
                                        else if(posicao==22){posicao=posicao+6}
                                        else if(posicao==29){posicao=posicao+6}
                                        else if(posicao==36){posicao=posicao+6}
                                        else if(posicao==43){posicao=posicao+6}
                                        else if(posicao==50){posicao=posicao+6}
                                        else if(posicao==57){posicao=posicao+6}
                                        else if(posicao==64){posicao=posicao+6}
                                        else if(posicao==71){posicao=posicao+6}
                                        else if(posicao==78){posicao=posicao+6}
                                        else if(posicao==85){posicao=posicao+6}
                                        else if(posicao==92){posicao=posicao+6}
                                        else if(posicao==99){posicao=posicao+6}
                                        else if(posicao==106){posicao=posicao+6}
                                        else if(posicao==113){posicao=posicao+6}
                                        else if(posicao==120){posicao=posicao+6}
                                        else if(posicao==127){posicao=posicao+6}
                                        else if(posicao==134){posicao=posicao+6}
                                        else if(posicao==141){posicao=posicao+6}
                                        else if(posicao==148){posicao=posicao+6}
                                        else if(posicao==155){posicao=posicao+6}
                                        else if(posicao==162){posicao=posicao+6}
                                        else{posicao--}
                                        if(posicao==0){posicao=1;}

                                    }

                                    //***********************************Fim indiferente *********************************************************************

                                    //***********************************************Random e impressão das respostas novas***********************************
                                    var butns=["certo","errado","indiferente"];
                                    var tem=$.randomBetween(0,2);
                                    var tem2=$.randomBetween(0,2);
                                    var tem3=$.randomBetween(0,2);

                                    while(tem==tem2){ tem2=$.randomBetween(0,2);}
                                    while(tem3==tem2 || tem3==tem){ tem3=$.randomBetween(0,2);}

                                    $("#btn1").attr('value',butns[tem]);
                                    $("#btn2").attr('value',butns[tem2]);
                                    $("#btn3").attr('value',butns[tem3] );

                                    ///////////////fim Random dos butones//////////////////////////////////////////////////////////////////


                                    score=score+(score2*bonus);
                                    score=parseInt(score);
                                    $('#'+posicao).css("backgroundColor", "green");
                                    $('#'+posicao).addClass("animated flash ");
                                    $('#perguntas').html(pergunta[posicao]);
                                    $('#result').html(score);
                                    var t0= $("#btn1").val();
                                    if(t0=="certo"){$("#btn1").html(certa[posicao]);}
                                    if(t0=="errado"){$("#btn1").html(errada[posicao]);}
                                    if(t0=="indiferente"){$("#btn1").html(indiferente[posicao]);}
                                    var t1= $("#btn2").val();
                                    if(t1=="certo"){$("#btn2").html(certa[posicao]);}
                                    if(t1=="errado"){$("#btn2").html(errada[posicao]);}
                                    if(t1=="indiferente"){$("#btn2").html(indiferente[posicao]);}
                                    var t3= $("#btn3").val();
                                    if(t3=="certo"){$("#btn3").html(certa[posicao]);}
                                    if(t3=="errado"){$("#btn3").html(errada[posicao]);}
                                    if(t3=="indiferente"){$("#btn3").html(indiferente[posicao]);}

                                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                    ////////////////////////////////////////função para mostrar o tempo atualizado e convertido////

                                    controle=0;
                                    total=total+(tempo-tempo2);

                                    var t= total/60;
                                    var minuto=parseInt(t);


                                    if(minuto<10){minuto="0"+minuto}
                                    var r= total%60;
                                    var seg=parseInt(r);
                                    if(seg<10){seg="0"+r}

                                    $("#total").html(minuto+":"+seg);
                                    tempo2=tempo;
                                    ///***************************************Fim da função************************************************************


                                });

                                $("#regra").colorbox();


                                //Example of preserving a JavaScript event for inline calls.
                                $("#click").click(function(){
                                    $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                                    return false;
                                });

                                $("#novo").click(function(){
                                    var novaURL = "jogo.php?jogo=<?php echo$jogo; ?>&nivel=<?php echo$nivel; ?> ";
                                    $(window.document.location).attr('href',novaURL);

                                });
                            });
           
                       

  
        </script>

        <style>
            #jogo{
                width: 550px;
                margin: 0 auto;
                padding: 8px;
                border-bottom-color: black;
                border-style: solid;
                border-radius: 20px;


            }

            #nav{

                background-color: #c2e6f4;
                border-radius:  0 0 10px 10px;
                margin-top: 5px;
                padding: 10px;
                box-shadow:  2px 2px 6px #000000;
            }
            #perguntas{
                margin-top: 20px;
                margin-bottom: 10px;
                background-color: white;
                font-weight: bolder;
                font-size: 16px;
                padding: 5px 10px 5px 10px;
                box-shadow: INSET 0 0 4px #cccccc;
                border-radius: 5px 0  0 5px;
            }
            .btns{
                border-width: thin;
                font-weight: bold;
                padding:3px;
                cursor: pointer;
                border-color: #bb8c13;
                background-color: #e3ce10;
                box-shadow:  1px 2px 4px #888;
                border-radius: 5px ;

            }
            #tempo{
                background-image: url('../images/cont.png'); 
                border: 0;
         margin-top: 8px;
                margin-left: 10px;
                border-radius: 5px ;
                float: left;
                width: 60px;
                height: 32px;
                line-height:32px;
                color: white;
                text-align: center;
                font-size: 22px;
            }
            a .btn{
                margin-left: 4px
            }
            #regras .btn{
                margin-left: 4px
            }
            #tot{
                background-color: #4180c6;
                box-shadow: INSET 0 0 8px #050563;
                border-radius: 0 5px 0 5px;
                padding: 1px 7px 1px 7px;
                border: 0;
                float: left;
                line-height:32px;
                height: 32px;
                color: white;
                margin-left: 10px;
                margin-top: 8px;
                text-align: center;
                font-size: 22px;
            }
            #score{
                background-color: #ed930b;
                box-shadow: INSET 0 0 10px #FFFFFF;
                border-radius: 0 5px 0 5px;
                padding: 1px 7px 1px 7px;
                border: 0;
                float: left;
                line-height:32px;
                height: 32px;
                color: white;
                margin-left: 10px;
                margin-top: 8px;
                text-align: center;
                font-size: 22px;
            }
            #img{
                position: relative;
                float: right;
                margin-right: 10px;
                margin-top: 5px;
            }
            #regras{


                padding: 8px;
                font-size: 18px;

            }
          .animated {
	-webkit-animation-duration: 1s;
	   -moz-animation-duration: 1s;
	     -o-animation-duration: 1s;
	        animation-duration: 1s;
	-webkit-animation-fill-mode: both;
	   -moz-animation-fill-mode: both;
	     -o-animation-fill-mode: both;
	        animation-fill-mode: both;
}

.animated.hinge {
	-webkit-animation-duration: 2s;
	   -moz-animation-duration: 2s;
	     -o-animation-duration: 2s;
	        animation-duration: 2s;
}

@-webkit-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

@-moz-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

@-o-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

@keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

.flash {
  -moz-animation-iteration-count: infinite;
    -webkit-animation-iteration-count:  infinite;
        animation-iteration-count: infinite;
	-webkit-animation-name: flash;
	-moz-animation-name: flash;
	-o-animation-name: flash;
	animation-name: flash;
}
            .btn1{
                height: 30px;  border: solid #2e338a thin;
                background-color: #5d63cf;
                color:white;
                font-weight: bold;
                font-family: sans-serif;
                margin-left: 6px;
                box-shadow: 2px 3x 4px #000000;
                text-shadow: 1px 1px 0 #888;
                border-radius:5px;
                cursor: pointer; 

            }
            #tre{
                margin-left:50px; 
                margin-top: 30px; 
                margin-right: 50px;
                margin-bottom: 30px;
                border-width: thick;
                border-radius:3px;
                padding: 15px

            }
            #btn1{font-size: 16px}
            #btn2{font-size: 16px}
            #btn3{font-size: 16px}
        </style>
        <div id="tey" style="width: 0; height: 0; z-index: 100; background:rgba(0, 0, 0, 0.4); 
             position: absolute; top: 0px; left: 0px; padding: 0">

            <div id="tre" >
            </div>
        </div>

        <div id="jogo">
            <?php
            echo"


<table width='100%'> <tr style='height: 15px; width:30px'>";
            $col = 0;
            $linha = 24;
            $j = 168;
            for ($i = 0; $i < 168; $i++) {
                $col++;



                //echo"<td  style='width:50px'><img src='images/bot.png' width='46px' height='20px'/></td>";
                echo"<td  style='height: 15px;background-color: #d5d0d0; box-shadow: INSET 0 0 3px #888'   id='$j'></td>";
                // mysql_query("insert into perguntas (pergunta,coluna,linha,certa,errada,indiferente,jogo_idjogo) VALUES ('PERGUNTA $i', $col,$linha,'CERTA', 'ERRADA', 'INDIFERENTE',1)");

                if ($col > 6) {
                    $linha--;
                    if ($linha == 0) {
                        
                    } else {
                        echo"<tr style='height: 15px; '>";
                        $col = 0;
                    }
                }
                $j--;
            }

            echo"</table>";
            ?>

            <div id="nav">
                <div id="img"></div>
                <img style="float: left; width: 40px;height: 47px" src="../images/cron.png" />
               <div id="tempo" ></div>
                <div id="tot"> Tempo:<span id="total">00:00</span></div>
                <div id="score">Score: <span id="result">0</span></div>

                <br>
                <br>
                <img  id="load" src="../images/loading.gif"/>
                <div  id="perguntas" style="font-size: 22px"></div>
                
                <span id=""><button id="btn1"  class="btn btn-info"  style="font-size: 22px" value=""></button></span>
                <span id=""><button id="btn2" class="btn btn-info" style="font-size: 22px" value=""></button></span>
                <span id=""><button id="btn3"  class="btn btn-info" style="font-size: 22px" value=""></button></span>
                <br>
               
                

        </div>
            </div>

<?php
require_once 'footer.php';
?>
