<?php 
require "funcao-itenspedido.php";
require "../funcao-sessao.php";

$id=$_GET['id'];

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];


excluirItenspedido($conexao,$id,$idCliente,$tipo);
header("location:../produto/formulario-produto.php");
?>