<?php 
require "funcao-cliente.php";
require "../funcao-sessao.php";
$id=$_GET['id'];

$idCliente=$_SESSION['id'];
$tipo=$_GET['tipo'];


excluirCliente($conexao,$id,$idCliente,$tipo);
header("location:formulario-cliente.php");
?>