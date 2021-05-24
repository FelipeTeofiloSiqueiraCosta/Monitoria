<?php

include '../CrudProduto/connection.php';
// addslashes
$e = ($_POST['email']);
$s = ($_POST['senha']);

echo "email: ".$e. " <br>senha: ".$s;

$s = "select * from usuario where email = '<b>".$e."</b>' and senha = '<b>".$s."</b>' ";
echo "<br><br>comando: ".$s;

$comando = mysqli_query($conexao, $s);
$nrows = mysqli_num_rows($comando);
$result = mysqli_fetch_assoc($comando);

if($nrows>0){
  // session_start();
  // $_SESSION['user'] = $result;
  // session_write_close();
  echo"<h1>Sucesso ao fazer login!!!</h1>";
  // header("Refresh: 3, url=../CrudProduto/ListagemProdutos.php");
}else{
  echo"<h1>Usuario incorreto!!!</h1>";
  // header("Refresh: 3, url=login.php");
}

?>