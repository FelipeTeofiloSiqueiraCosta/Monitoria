<?php
  // include '../CrudProduto/connection.php';

  Class Operation{
    
    private $servidor;
    private $usuario;
    private $senha;
    private $banco;

    public function Operation(){
      $this->servidor = 'localhost';
      $this->usuario = 'root';
      $this->senha='';
      $this->banco='dbmonitoria';
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

    private function connectDB(){
      $conexao  = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->banco) or die("Erro nao conexão do banco!");
      return $conexao;
    }

    public function getAllForTable($table){
      $conexao = $this->connectDB();
      $command = "select * from $table";
      $result = mysqli_query($conexao, $command);
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
      
    }
    private function desconecta($con){
      if($con){
        mysqli_close($con);
      }
    }
    public function getServidor(){
      return $this->servidor;
    }

  }
  // $op = new Operation;
  // echo $op->servidor;
  // var_dump($op->getAllForTable('produto'));
  

?>