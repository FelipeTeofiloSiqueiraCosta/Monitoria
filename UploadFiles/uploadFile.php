<?php
  date_default_timezone_set("America/Sao_Paulo");
  function current_url()
    {
        $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $validURL = str_replace("&", "&amp", $url);
        return $validURL;
    }
//-----------------Armazenamento em uma pasta-----------------------------------------
    
  // echo current_url().'/../images/';
  echo "<br>";
  $t=time();
  // echo($t . "<br>");
  // echo(date("Y-m-d",$t)); 
  // verifica se foi enviado um arquivo
if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
  // echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
  // echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
  // echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
  // echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';

  $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
  $nome = $_FILES[ 'arquivo' ][ 'name' ];

  // Pega a extensão
  $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

  // Converte a extensão para minúsculo
  $extensao = strtolower ( $extensao );
  // Somente imagens, .jpg;.jpeg;.gif;.png
  // Aqui eu enfileiro as extensões permitidas e separo por ';'
  // Isso serve apenas para eu poder pesquisar dentro desta String
  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
      // Cria um nome único para esta imagem
      // Evita que duplique as imagens no servidor.
      // Evita nomes com acentos, espaços e caracteres não alfanuméricos
      $novoNome = uniqid ( time () ) . '.' . $extensao;

      // Concatena a pasta com o nome ------------------------ aaaaa
      $destino =  './Images/'.$novoNome;
      // echo "<br><br>Arquivo: $arquivo_tmp";
      // echo "<br><br>DESTINO: ".$destino;

      // tenta mover o arquivo para o destino
      if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
          // echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
          // echo ' <img src = "'.$destino.'"  style="width: 100px;"/>';
          echo "<br><br>Sucesso ao enviar o arquivo!";
          header('refresh: 3, url=index.php');
      }
      else
          echo '<br><br>Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
  }
  else
      echo '<br><br>Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
  echo '<br><br>Você não enviou nenhum arquivo!';
  header('refresh: 3, url=index.php');

  // -----------------------------------------------------------------------------------------------------------------




?>