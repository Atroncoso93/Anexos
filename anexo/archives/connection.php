<?php
$link = mysql_connect ('localhost', 'root', 'root');
if (!$link){
echo 'error al conectar';
die;
}
$bd = mysql_select_db('anexos');
if (!$bd){
echo 'error al seleccionar la base d datos';
die;
}
mysql_query ("SET NAMES 'utf8'");
?>