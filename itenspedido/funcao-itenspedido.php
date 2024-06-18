<?php
require "conecta.php";

function inserirItensPedido($conexao,$quantidade,$valor,$produto_id,$cliente_id){
    $sql="INSERT INTO itenspedido(quantidade,valor,produto_id,cliente_id) VALUES($quantidade,$valor,$produto_id,$cliente_id)";

    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function alterarItenspedido($conexao,$id,$quantidade,$valor,$idCliente,$tipo){
    if($tipo=='admin'){
    $sql="UPDATE itenspedido SET quantidade=$quantidade,valor=$valor WHERE id=$id ";
    }else{
    $sql="UPDATE itenspedido SET quantidade=$quantidade,valor=$valor WHERE id=$id AND $idCliente ";
    }
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function excluirItenspedido($conexao,$id,$idCliente,$tipo){
    if($tipo=='admin'){
    $sql="DELETE FROM itenspedido WHERE id=$id ";
    }else{
        $sql="DELETE FROM itenspedido WHERE id=$id AND cliente_id= $idCliente";   
    }
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function listarItenspedido($conexao,$idCliente,$tipo){
    if($tipo=='admin'){
    $sql="SELECT itenspedido. *,produto.nome AS produto_nome,cliente.nome AS cliente_nome FROM itenspedido  JOIN produto ON 
    itenspedido.produto_id=produto.id JOIN cliente ON itenspedido.cliente_id=cliente.id";
    }else{
        $sql="SELECT itenspedido. *,produto.nome AS produto_nome,cliente.nome AS cliente_nome FROM itenspedido  JOIN produto ON 
        itenspedido.produto_id=produto.id JOIN cliente ON itenspedido.cliente_id=cliente.id WHERE cliente_id=$idCliente";   
    }

$resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}
   

function buscarUmItenspedido($conexao,$id){
    $sql="SELECT * FROM itenspedido WHERE id=$id";

  $resultado=mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_assoc($resultado);
}

function calcularItens($conexao,$idCliente,$tipo){
    if($tipo=='admin'){
  $sql="SELECT  SUM(quantidade * valor)AS valor FROM itenspedido";
    }else{
  $sql="SELECT  SUM(quantidade * valor)AS valor FROM itenspedido WHERE cliente_id=$idCliente";
    }

$resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}

?>