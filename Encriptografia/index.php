<?php include '../CrudProduto/connection.php'; include '../FunctionsPHP/funcoes.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Produtos</title>
</head>
<body>
  
<div id="table-area"> 
  <label for="valor">Pesquisar produtos por valor:</label>
  <input type="number" step="any" id="valor">
<table border="1">
    <thead>
    <th>Id</th>
    <th>Descricao</th>
    <th>Preço</th>
    <th>Qte Estoque</th>
    <th>Operações</th>
    </thead>
    <tbody id="content">
    <?php
  

    // $comando = mysqli_query($conexao,"select * from produto");
    // $resultado = mysqli_fetch_assoc($comando);

    //     $op = new Operation();
        
    // if($comando){
      
    //     while($resultado!=null){
    //       $id = $resultado['id'];
    //       $desc = $op->convert_encoding($resultado['descricao']);
    //       $preco = number_format($resultado['preco'],2,',','.');
    //       $qte = $resultado['qteEstoque'];
  
    //       echo"<tr><td>$id</td> <td>$desc</td> <td>$preco</td> <td>$qte</td> <td><a href='excluirProduto.php?id=$id'>Excluir</a> <a href='formAlterarProduto.php?id=$id'>Alterar</a></td></tr>";
    //       $resultado = mysqli_fetch_assoc($comando);
      
    //     }
    //     echo "</tbody>";
    //   }else{
    //     echo"!Erro ao obter lista de produtos!";
    //   }
      
      

    // echo"</table>";
    ?>
</div>
<script src="./dist/encript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
</body>

<script type="text/javascript">

    var s = new Script(35);

  let num=-1;

      $("#valor").on('keyup',function(e){
        
        // console.log($("#valor").val());
        if($("#valor").val() == ''){
          $.ajax({
          url: "./Services/getProdByValor.php",
          method: "GET",
          async: true,
          data: {
            n: -1,
          },
          success: function( result ) {
            let text = '';
            
            document.getElementById('content').innerHTML = result;
          }
        });

        }else{
          $.ajax({
          url: "./Services/getProdByValor.php",
          method: "GET",
          async: true,
          data: {
            n: $("#valor").val(),
          },
          success: function( result ) {
            let text = '';


            document.getElementById('content').innerHTML = result;
          }
        });
        }

      });

  $(document).ready(function(){
    
    $.ajax({
          url: "./Services/getProdByValor.php",
          method: "GET",
          async: true,
          data: {
            n: num,
          },
          success: function( result ) {
            let text = '';
            let r = JSON.parse(result);
            
            for(let i=0;i<r.length;i++){
              text += "<tr><td>"+s.Decript(r[i]['id'])+"</td> <td>"+s.Decript(r[i]['descricao'])+"</td>"+
              "<td>"+s.Decript(r[i]['preco'])+"</td> <td>"+s.Decript(r[i]['qteEstoque'])+"</td> <td><a href='../CrudProduto/excluirProduto.php?id="+s.Decript(r[i]['id'])+"'>Excluir</a> <a href='../CrudProduto/formAlterarProduto.php?id="+s.Decript(r[i]['id'])+"'>Alterar</a></td></tr>";
            }
            
            document.getElementById('content').innerHTML = text;
          }
        });
  });

</script>

</html>