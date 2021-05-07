<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form method="POST" action="cadastraProduto.php">
      <label for="desctricao">Descrição </label><br>
      <input id="desctricao" type="text" name="descricao" value=""><br>
      <label for="preco">Preço </label><br>
      <input id="preco" type="number" step="any" name="preco" value=""><br>
      <label for="estoque">Qte. Estoque </label><br>
      <input id="estoque" type="number" name="estoque" value="">

      <input type="submit" value="Cadastrar">
    </form>

</body>
</html>