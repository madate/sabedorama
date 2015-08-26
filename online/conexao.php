<?
$ACONFIG = array();
$ACONFIG['s_dbhost'] = 'localhost';
$ACONFIG['s_dbname'] = 'dbname';
$ACONFIG['s_dbuser'] = 'usuario';
$ACONFIG['s_dbpass'] = 'senha';

if(!($serverConnection = @mysql_connect($ACONFIG['s_dbhost'], $ACONFIG['s_dbuser'], $ACONFIG['s_dbpass']))) {
   echo "<p align='center'>Não foi possível estabelecer uma conexão com o servidor. Favor Contatar o <a href='mailto:seuemail'>Administrador</a>.</p>";
   exit;
}

if(!($dbConnection = @mysql_select_db($ACONFIG['s_dbname']))) {
   echo "<p align='center'>Não foi possível estabelecer uma conexão com a base de dados. Favor Contatar o <a href='mailto:seuemail'>Administrador</a>.</p>";
   exit;
}
?>