<?php

Class Script{

  private $key;
  private $random = ['@','#','!', '*','&', '%', '$'];

  public function Script($k=1){
    $this->key = $k;
  }
  private function convertStringInAsciiCode($data){
    
    $v = rand(0,sizeof($this->random)-1);
    $value='';
    
    for($i=0;$i<strlen($data);$i++){
      
      $value .= chr((ord(substr($data, $i, ($i+1))))-($this->key)).''.$this->random[$v];
      $v = rand(0,sizeof($this->random)-1);
    }
    return $value;
  }

  private function translateStringInAsciiCode($data){

    $value='';
    
    for($i=0;$i<strlen($data)-1;$i++){
      
      if($i==0) {$value .= chr((ord(substr($data, (0), 1)))+($this->key));}
      else{ 
        if(substr($data, ($i+1), 1)!='@' && substr($data, ($i+1), 1)!='#' && 
          substr($data, ($i+1), 1)!='!' && substr($data, ($i+1), 1)!='*' && 
          substr($data, ($i+1), 1)!='%' && substr($data, ($i+1), 1)!='&' && 
          substr($data, ($i+1), 1)!='$'){
            
            $value .= chr((ord(substr($data, ($i+1), 1)))+($this->key));
          
        }
      }
    
    }
    return $value;
  }

  public function Encript($data){
    
    if(is_array($data)){
      $vars='';
      // var_dump($vars);
          for($i=0;$i<sizeOf($data);$i++){
            $vars = array_keys($data[$i]);
            for($x=0;$x<sizeof($vars);$x++){
              $data[$i][$vars[$x]] = $this->convertStringInAsciiCode($data[$i][$vars[$x]]);
            }
          }
        return $data;
    }
    if(is_string($data)){
      return $this->convertStringInAsciiCode($data);
    }

  }

  public function Decript($data){

    if(is_array($data)){
      $vars='';
      // var_dump($vars);
          for($i=0;$i<sizeOf($data);$i++){
            $vars = array_keys($data[$i]);
            for($x=0;$x<sizeof($vars);$x++){

              $data[$i][$vars[$x]] = $this->translateStringInAsciiCode($data[$i][$vars[$x]]);
            }
          }
        return $data;
    }

    return $this->translateStringInAsciiCode($data);
  }

}

// $es = new Script(62);

// $r = ($es->Encript('Olá mundo!'));
// echo 'Encript <br>'.$r."<br><br>";

// echo  '<br>Decript <br>'.($es->Decript($r));



?>

