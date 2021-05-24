<?php

Class GlobalController{

    private $host = 'localhost';
    private $dbname = 'dbmonitoria';
    private $username = 'root';
    private $password = '';

  public function GlobalController(){
    
  }

  private function detect_encoding($string){
      ////w3.org/International/questions/qa-forms-utf-8.html
      if (preg_match('%^(?: [\x09\x0A\x0D\x20-\x7E] | [\xC2-\xDF][\x80-\xBF] | \xE0[\xA0-\xBF][\x80-\xBF] | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} | \xED[\x80-\x9F][\x80-\xBF] | \xF0[\x90-\xBF][\x80-\xBF]{2} | [\xF1-\xF3][\x80-\xBF]{3} | \xF4[\x80-\x8F][\x80-\xBF]{2} )*$%xs', $string))
          return 'UTF-8';

      //If you need to distinguish between UTF-8 and ISO-8859-1 encoding, list UTF-8 first in your encoding_list.
      //if you list ISO-8859-1 first, mb_detect_encoding() will always return ISO-8859-1.
      return mb_detect_encoding($string, array('UTF-8', 'ASCII', 'ISO-8859-1', 'JIS', 'EUC-JP', 'SJIS'));
  }
  public function convert_encoding($string, $to_encoding='UTF-8', $from_encoding = ''){
      if ($from_encoding == '')
          $from_encoding = $this->detect_encoding($string);

      if ($from_encoding == $to_encoding)
          return $string;

      return mb_convert_encoding($string, $to_encoding, $from_encoding);
  }
  
  public function getConnection(){
    try {
      return (new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password));
      echo "Conectado a $dbname em $host com sucesso.";
    } catch (PDOException $pe) {
        die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage());
    }

  }

  public function getAllForTable($table){
    $pdo = $this->getConnection();
    $command = "select * from $table";
    $result = $pdo->query($command);
    $result->execute();
    return $result->fetchAll();
  }


}

$g = new GlobalController();
$pdo = $g->getConnection();
$arrayDeUsuarios = $g->getAllForTable('usuario');

// var_dump($arrayDeUsuarios); // = apresentar array de usuarios 

/////////////// apresentar informações em uma tabela:
  
  // echo "<table border='1'><thead><th>Id</th><th>Usuario</th><th>Email</th><th>senha</th></thead>";
  // echo "<tbody>";
  // for($i=0;$i<sizeof($arrayDeUsuarios); $i++){
  //     $id = $arrayDeUsuarios[$i]['id'];
  //     $nome = $arrayDeUsuarios[$i]['nome'];
  //     $email = $arrayDeUsuarios[$i]['email'];
  //     $senha = $arrayDeUsuarios[$i]['senha'];
  //     echo "<tr><td>$id</td> <td>$nome</td> <td>$email</td> <td>$senha</td></tr>";
  // }
  // echo "</tbody>";
  // echo "</table>";
  
///////////////OUTRA FORMA

  // echo "<table border='1'><thead><th>Id</th><th>Usuario</th><th>Email</th><th>senha</th></thead>";
  // echo "<tbody>";
  // $command = "select * from usuario";
  // $result = $pdo->query($command);
  // while($linha = $result->fetch(PDO::FETCH_ASSOC)){
  //       $id = $linha['id'];
  //       $nome = $linha['nome'];
  //       $email = $linha['email'];
  //       $senha = $linha['senha'];
  //       echo "<tr><td>$id</td> <td>$nome</td> <td>$email</td> <td>$senha</td></tr>";
  // }
  // echo "</tbody>";
  // echo "</table>";


?>