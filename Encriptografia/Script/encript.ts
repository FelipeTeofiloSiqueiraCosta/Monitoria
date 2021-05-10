

class Script{

  private key;
  private random = ['@','#','!', '*','&', '%', '$'];

  constructor(k: number = 1){
    this.key = k;
  }

  getRandomInt(min: number, max: number) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
  }
  
  chr(chr: any){
    return String.fromCharCode(chr);
  }

  ord(index: any){
    return index.charCodeAt(0);
  }

  convertStringInAsciiCode(data: any){
    
    let v = this.getRandomInt(0,((this.random).length)-1);
    let value='';
    
    for(let i=0;i<(data).length;i++){
      
      value += this.chr((this.ord(data.substring(i,i+1))) - (this.key))+''+this.random[v];
      v = this.getRandomInt(0,((this.random).length)-1);
    }
    return value;
  }

  translateStringInAsciiCode(data: any){

    let value='';
    
    for(let i=0;i<data.length-1;i++){
      
      if(i==0) {value += this.chr((this.ord(data.substring(0,1)))+(this.key));}
      else{ 
        if(data.substring(i,i+1)!='@' && data.substring(i,i+1)!='#' && 
        data.substring(i,i+1)!='!' && data.substring(i,i+1)!='*' && 
        data.substring(i,i+1)!='%' && data.substring(i,i+1)!='&' && 
        data.substring(i,i+1)!='$'){
            
            value += this.chr((this.ord(data.substring(i,i+1)))+(this.key));
          
        }
      }
    
    }
    return value;
  }

  Encript(data: any){
    
    if(Array.isArray(data)){
      let vars;
      // var_dump($vars);
          for(let i=0;i<data.length;i++){
            vars = Object.keys(data[i]);
            for(let x=0;x<vars.length;x++){
              data[i][vars[x]] = this.convertStringInAsciiCode(data[i][vars[x]]);
            }
          }
        return data;
    }
    if(typeof data == 'string'){
      return this.convertStringInAsciiCode(data);
    }

  }

  Decript(data: any){

    if(Array.isArray(data)){
      let vars;
      // var_dump($vars);
          for(let i=0;i<data.length;i++){
            vars = Object.keys(data[i]);
            for(let x=0;x<vars.length;x++){

              data[i][vars[x]] = this.translateStringInAsciiCode(data[i][vars[x]]);
            }
          }
        return data;
    }

    return this.translateStringInAsciiCode(data);
  }

}

// $es = new Script(62);

// $r = ($es->Encript('Olá mundo!'));
// echo 'Encript <br>'.$r."<br><br>";

// echo  '<br>Decript <br>'.($es->Decript($r));





