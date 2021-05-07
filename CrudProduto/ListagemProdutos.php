<?php include './connection.php'; include '../FunctionsPHP/funcoes.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Produtos</title>
</head>
<body>
    <?php
    session_start();
    $id = $_SESSION['user']['nome'];
    echo 'ID user: '.$id."<br>";
    ?>

    <table border="1">
    <th>Id</th>
    <th>Descricao</th>
    <th>Preço</th>
    <th>Qte Estoque</th>
    <th>Operações</th>
    <?php


    $comando = mysqli_query($conexao,"select * from produto");
    $resultado = mysqli_fetch_assoc($comando);

    //---- Utilizando Objeto e funções em PHP------
        $op = new Operation();
    // $resultado = $op->getAllForTable('produto');
    // if(count($resultado)>0){
    //   for($i=0;$i<count($resultado);$i++){
    //     $id = $resultado[$i]['id'];
    //     $desc = $resultado[$i]['descricao'];
    //     $preco = number_format($resultado[$i]['preco'],2,',','.');
    //     $qte = $resultado[$i]['qteEstoque'];

    //     echo"<tr><td>$id</td> <td>$desc</td> <td>$preco</td> <td>$qte</td> <td><a href='excluirProduto.php?id=$id'>Excluir</a> <a href='formAlterarProduto.php?id=$id'>Alterar</a></td></tr>";
    //     
    
    //   }
    // }else{
    //   echo"!Erro ao obter lista de produtos!";
    // }
    // --------------------------------------------
    if($comando){
        while($resultado!=null){
          $id = $resultado['id'];
          $desc = $op->convert_encoding($resultado['descricao']);
          $preco = number_format($resultado['preco'],2,',','.');
          $qte = $resultado['qteEstoque'];
  
          echo"<tr><td>$id</td> <td>$desc</td> <td>$preco</td> <td>$qte</td> <td><a href='excluirProduto.php?id=$id'>Excluir</a> <a href='formAlterarProduto.php?id=$id'>Alterar</a></td></tr>";
          $resultado = mysqli_fetch_assoc($comando);
      
        }
      }else{
        echo"!Erro ao obter lista de produtos!";
      }
      

    echo"</table>";
    ?>
    <a href="index.php">Cadastrar Produto</a>
    
</body>
</html>