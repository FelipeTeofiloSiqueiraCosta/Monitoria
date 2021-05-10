<?php
  include '../../CrudProduto/connection.php';include '../../FunctionsPHP/funcoes.php';

  $n = $_GET['n'];
  $dados = '';
  $s;
  if($n == -1){
    $s = "select * from produto where preco";
  }else{
  $s = "select * from produto where preco <= $n";
  
  }
// echo $s;
    $comando = mysqli_query($conexao, "$s");
    $resultado = mysqli_fetch_assoc($comando);
    $op = new Operation();
    while($resultado !=null){
        $id = $resultado['id'];
          $desc = $op->convert_encoding($resultado['descricao']);
          $preco = number_format($resultado['preco'],2,',','.');
          $qte = $resultado['qteEstoque'];
      $dados .= "<tr><td>$id</td> <td>$desc</td> <td>$preco</td> <td>$qte</td> <td><a href='../CrudProduto/excluirProduto.php?id=$id'>Excluir</a> <a href='../CrudProduto/formAlterarProduto.php?id=$id'>Alterar</a></td></tr>";

      $resultado = mysqli_fetch_assoc($comando);
    }


  echo $dados;

?>