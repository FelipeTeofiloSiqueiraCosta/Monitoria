<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem Images</title>
</head>
<body>
<table border="1">
    <th>Id</th>
    <th>Imagem</th>
    <th>Nome</th>
    <th>Tipo</th>
    <th>Tamanho</th>
    <th>Operações</th>
    <?php
    include '../CrudProduto/connection.php';include '../FunctionsPHP/funcoes.php';

    $comando = mysqli_query($conexao,"select * from image");
    $resultado = mysqli_fetch_assoc($comando);

        $op = new Operation();
  
    if($comando){
        while($resultado!=null){
          $id = $resultado['id'];
          $image = $op->convert_encoding($resultado['nome']);
          $tipo = $resultado['tipo'];
          $tamanho = $resultado['tamanho'];
  
          echo"<tr><td>$id</td> <td style='background-image: url(./Images/$image);background-position: center;background-repeat: no-repeat;width: 50px; height: 50px;background-size: cover;'></td> <td>$image</td> <td>$tipo</td><td>$tamanho</td> <td><a href='excluirImagem.php?id=".json_encode($resultado)."'>Excluir</a> <a href='formAlterarImagem.php?id=".json_encode($resultado)."'>Alterar</a></td></tr>";
          $resultado = mysqli_fetch_assoc($comando);
      
        }
      }else{
        echo"!Erro ao obter lista de produtos!";
      }
      

    echo"</table>";
    ?>
    <a href="index.php">Cadastrar Imagem</a>
</body>
</html>