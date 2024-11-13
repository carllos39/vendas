<?php
require "conecta.php";

function inserirProduto($conexao,$nome,$descricao,$valor){
    $sql="INSERT INTO produto(nome,descricao,valor) VALUES('$nome','$descricao',$valor) ";

    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function alterarProduto($conexao,$id,$nome,$descricao,$valor){
    $sql=" UPDATE produto SET nome='$nome',descricao='$descricao',valor=$valor WHERE id=$id ";

    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function excluirProduto($conexao,$id){
    $sql="DELETE FROM produto  WHERE id=$id ";

    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
}

function listarProduto($conexao){
    $sql="SELECT * FROM produto";

  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}
function buscarUmProduto($conexao,$id){
    $sql="SELECT * FROM produto WHERE id=$id";

  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_assoc($resultado);
}
function buscarProduto($conexao){
  $sql="SELECT id,valor FROM produto ";

$resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}
function somaProduto($valor,$quantidade){
  $total=$valor * $quantidade;
  return $total; 

}
function listaItensProduto($conexao){
  $sql="SELECT SUM(valor) AS valor FROM produto";

  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}
function calcularProduto($conexao){
  $sql="SELECT SUM(valor * quantidade) AS valor FROM produto";

  $resultado=  mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
  return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}
?>
