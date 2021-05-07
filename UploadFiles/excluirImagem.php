<?php
  include '../CrudProduto/connection.php';
  $r = json_decode($_GET['id']);
  // var_dump($r);

  $comando = mysqli_query($conexao, "delete from image where id = ".$r->id);

  if($comando){
    echo "<br><br>Sucesso ao excluir!";
    unlink("./Images/".$r->nome);
    header('refresh: 0, url=listagemImagens.php');
  }else{
    echo "<br><br>Erro ao excluir!";
    header('refresh: 3, url=listagemImagens.php');
  }
  

?>