<?php
require "conecta.php";

function inserirCliente($conexao,$nome,$email,$senha,$tipo){
    $sql="INSERT INTO cliente(nome,email,senha,tipo) VALUES('$nome','$email','$senha','$tipo') ";

    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function alterarCliente($conexao,$id,$nome,$email,$senha,$idCliente,$tipo){
  if($tipo=='admin'){
    $sql="UPDATE cliente SET nome='$nome',email='$email',senha='$senha',tipo='$tipo' WHERE id=$id ";
  }else{
    $sql="UPDATE cliente SET nome='$nome',email='$email',senha='$senha',tipo='$tipo' WHERE id=$id AND $idCliente";
  }
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function excluirCliente($conexao,$id,$idCliente,$tipo){
  if($tipo=='admin'){
    $sql="DELETE FROM cliente  WHERE id=$id ";
  }else{
    $sql="DELETE FROM cliente  WHERE id=$id  AND $idCliente";
  }
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function listarCliente($conexao,$idCliente,$tipo){
  if($tipo=='admin'){
    $sql="SELECT * FROM cliente";
  }else{
    $sql="SELECT * FROM cliente WHERE id=$idCliente";
  }

  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}

function buscarCliente($conexao,$email){
    $sql="SELECT * FROM cliente WHERE email='$email'";

  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_assoc($resultado);
}

function buscarUmCliente($conexao,$id){
    $sql="SELECT * FROM cliente WHERE id=$id";

  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_assoc($resultado);
}
?>