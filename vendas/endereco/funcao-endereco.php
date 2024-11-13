<?php
require "conecta.php";

function inserirEndereco($conexao,$endereco,$numero,$bairro,$cidade,$estado,$cliente_id){
    $sql="INSERT INTO endereco(endereco,numero,bairro,cidade,estado,cliente_id) VALUES('$endereco',$numero,'$bairro','$cidade','$estado',$cliente_id) ";

    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function alterarEndereco($conexao,$id,$endereco,$numero,$bairro,$cidade,$estado,$idCliente,$tipo){
  if($tipo=='admin'){
    $sql=" UPDATE endereco SET endereco='$endereco',numero=$numero,bairro='$bairro',cidade='$cidade',estado='$estado',cliente_id,$tipo WHERE id=$id ";
}else{
  $sql=" UPDATE endereco SET endereco='$endereco',numero=$numero,bairro='$bairro',cidade='$cidade',estado='$estado' 
  WHERE id=$id AND cliente_id=$idCliente";
  
}
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function excluirEndereco($conexao,$id,$idCliente,$tipo){
  if($tipo=='admin'){
    $sql="DELETE FROM endereco  WHERE id=$id ";
  }else{
    $sql="DELETE FROM endereco  WHERE id=$id AND cliente_id=$idCliente "; 
  }
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function listarEndereco($conexao,$idCliente,$tipo){
  if($tipo=='admin'){
    $sql="SELECT endereco. *,cliente.nome AS cliente_nome FROM endereco JOIN cliente ON endereco.cliente_id=cliente.id ";
  }else{
    $sql="SELECT endereco. *,cliente.nome AS cliente_nome FROM endereco JOIN cliente ON endereco.cliente_id=cliente.id WHERE cliente_id=$idCliente";
  }
  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}
function buscarUmEndereco($conexao,$id,$idCliente,$tipo){
  if($tipo=='admin'){
    $sql="SELECT * FROM endereco WHERE id=$id";
  }else{
    $sql="SELECT * FROM endereco WHERE id=$id AND cliente_id=$idCliente";  
  }
  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_assoc($resultado);
}
?>