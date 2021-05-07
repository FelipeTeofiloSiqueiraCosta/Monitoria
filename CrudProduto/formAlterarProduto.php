<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AlterarProduto</title>
</head>
<body>
  <?php
  include './connection.php';
  $idProduto = $_GET['id'];
  $comando = mysqli_query($conexao,"select * from produto where id = $idProduto");
  $result = mysqli_fetch_assoc($comando);
  $desc = $result['descricao'];
  $preco = $result['preco'];
  $preco = number_format($preco,2,".",",");
  $qte = $result['qteEstoque'];

  ?>
    <h1>Alterar Produto #<?=$idProduto?></h1>
    <form method="POST" action="<?php echo "alterarProduto.php?id=$idProduto"?>">
      <label for="desctricao">Descrição </label><br>
      <input id="desctricao" type="text" name="descricao" value="<?=$desc?>"><br>
      <label for="preco">Preço </label><br>
      <input id="preco" type="number" step="any" name="preco" value="<?=$preco?>"><br>
      <label for="estoque">Qte. Estoque </label><br>
      <input id="estoque" type="number" name="estoque" value="<?=$qte?>">

      <input type="submit" value="Alterar">
    </form>
</body>
</html>