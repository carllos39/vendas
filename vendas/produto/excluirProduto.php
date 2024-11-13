<?php 
require "funcao-produto.php";
$id=$_GET['id'];


excluirProduto($conexao,$id);
header("location:formulario-produto.php");
?>