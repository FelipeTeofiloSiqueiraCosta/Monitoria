<?php
include './connection.php';

$id = $_GET['id'];
$desc = $_POST['descricao'];
$qte = $_POST['estoque'];
$valor = number_format($_POST['preco'],2,".",",");

$comando = mysqli_query($conexao,"UPDATE produto SET descricao = '$desc', preco = $valor, qteEstoque = $qte WHERE id = $id");

if($comando){
  echo"<h1>Produto Alterado com Sucesso!!!</h1>";
  header("Refresh: 3, url=ListagemProdutos.php");
}else{
  echo"<h1>Erro ao Alterar o Produto!!!</h1>";
  header("Refresh: 3, url=ListagemProdutos.php");
}

?>