<?php

$servidor = 'localhost';
$usuario='root';
$senha='';
$banco='dbmonitoria';

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco) or die("Erro nao conexão do banco!");

?>