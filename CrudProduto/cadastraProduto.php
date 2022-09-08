<?php
include './connection.php';

$desc = $_POST['descricao']; //pegando descrição do formulário
$qte = $_POST['estoque']; //pegando estoque do formulário
$valor = $_POST['preco']; //pegando preco do formulário

echo "descricao: ".$desc." qte em estoque: ".$qte." Preço: ".$valor;

$comando = mysqli_query($conexao,"insert into produto(descricao,qteEstoque,preco) values('$desc',$qte,$valor)");

//o retorno da execução do insert é booleano (retorna true ou false)

if($comando){
  echo"<h1>Produto inserido com Sucesso!!!</h1>";
  header("Refresh: 3, url=ListagemProdutos.php");
}else{
  echo"<h1>Erro ao inserir o Produto!!!</h1>";
  header("Refresh: 3, url=index.php");
}

?>
