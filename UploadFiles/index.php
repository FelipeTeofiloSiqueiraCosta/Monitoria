<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload File</title>
</head>

<style>
  *{
    margin: 0;
    padding:0;
    box-sizing: border-box;
  }
  body{
    width: 100%;
    height: auto;
    min-height: 100vh;
  }
  ul{
    position: relative;
    margin-left: 50%;
    transform: translateX(-50%);
  }
</style>

<body >
    <ul>
      <li>
        Quantidade máxima de memória um script pode consumir
        <br>http://php.net/memory-limit
        <br>memory_limit = 128M

      </li>
      <li>
        Permitir o upload de arquivos.
        <br>http://php.net/file-uploads
        <br>file_uploads = On
      </li>
      <li>
        Tamanho máximo permitido para upload de arquivos.
        <br>http://php.net/upload-max-filesize
        <br>upload_max_filesize = 128M
      </li>
    </ul>
    <br><br><br>

    <form method="post" enctype="multipart/form-data" action="uploadFile.php">
      Selecione uma imagem: <input name="arquivo" type="file" />
      <br />
      <input type="submit" value="Salvar" />
    </form>
    
</body>
</html>