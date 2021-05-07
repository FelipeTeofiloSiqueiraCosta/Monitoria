<?php
include './connection.php';

$desc = $_POST['descricao'];
$qte = $_POST['estoque'];
$valor = $_POST['preco'];

echo "descricao: ".$desc." qte em estoque: ".$qte." Preço: ".$valor;

$comando = mysqli_query($conexao,"insert into produto(descricao,qteEstoque,preco) values('$desc',$qte,$valor)");

if($comando){
  echo"<h1>Produto inserido com Sucesso!!!</h1>";
  header("Refresh: 3, url=ListagemProdutos.php");
}else{
  echo"<h1>Erro ao inserir o Produto!!!</h1>";
  header("Refresh: 3, url=index.php");
}

?>