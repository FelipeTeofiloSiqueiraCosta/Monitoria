<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar email</title>
</head>
<body>
<form action="email.php" method="post">
	<label for="nome">Nome:</label><br>
	<input type="text" name="nome" size="35" /><br>

	<label for="email">E-mail:</label><br>
	<input type="text" name="email" size="35" /><br>

	<!-- <label for="fone">Telefone:</label><br>
	<input type="text" name="fone" size="35" /><br>
 -->
	<label for="mensagem">Mensagem:</label><br>
	<textarea name="mensagem" rows="8" cols="40"></textarea><br>

	<input type="submit" name="Enviar" value="Enviar" />
</form>
</body>
</html>