<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Imagem</title>
</head>
<body>
<?php
  
  $r = json_decode($_GET['id']);
  $e = json_encode($r);
  $s = "alterarImagem.php?id=$e";
?>
    <form method="post" enctype="multipart/form-data" action='<?=$s?>'>
    <label>Imagem antiga: <?=$r->nome?></label><br>
      Selecione uma imagem nova: <input name="arquivo" type="file"/>
      <br />
      <input type="submit" value="Salvar" />
    </form>
</body>
</html>