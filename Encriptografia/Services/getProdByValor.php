<?php
  include '../../CrudProduto/connection.php';include '../../FunctionsPHP/funcoes.php';
  include '../Script/encript.php';

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
    $arr = Array();
    while($resultado !=null){
      array_push($arr, array_map('utf8_encode',$resultado));
      $resultado = mysqli_fetch_assoc($comando);
    }

    $es = new Script(35);

    $r = $es->Encript($arr);
    // $r = $es->Decript($r);
    $arr = $r;

  echo json_encode($arr);

?>