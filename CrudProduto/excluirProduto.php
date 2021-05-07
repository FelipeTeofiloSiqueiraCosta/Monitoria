<?php

include './connection.php';
$idProduto = $_GET['id'];
$comando = mysqli_query($conexao, "delete from produto where produto.id = $idProduto");
if($comando){
  echo"<h1>Produto excluido com Sucesso!!!</h1>";
}else{
  echo"<h1>Erro ao excluir Produto!!!</h1>"; 
}
header('Refresh: 0, url=ListagemProdutos.php');

?>