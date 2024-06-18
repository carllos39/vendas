<?php 
require "funcao-endereco.php";
require "funcao-sessao.php";
$id=$_GET['id'];
$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];


excluirEndereco($conexao,$id,$idCliente,$tipo);
header("location:formulario-endereco.php");
?>