<?php

$host = 'localhost';
$user = 'root';
$pass = '';

$con = mysql_connect($host,$user,$pass) or die ('Erro ao conecta o banco');

mysql_select_db('easy_to_learn_q07',con) or die ('Erro ao seleciona banco');

mysql_query("CALL new_proccess()");