<?php
require "../cabecalho.php";
require "../itenspedido/funcao-itenspedido.php";
require "../produto/funcao-produto.php";
require "../funcao-sessao.php";
$id=$_GET['id']; 

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];

$itenspedido=buscarUmItenspedido($conexao,$id,$idCliente,$tipo);




if(isset($_POST['alterar'])){
    $id=mysqli_real_escape_String($conexao,$_POST['id']);
    $quatidade=mysqli_real_escape_String($conexao,$_POST['quantidade']);
    $valor=mysqli_real_escape_String($conexao,$_POST['valor']);
 


    alterarItenspedido($conexao,$id,$quatidade,$valor,$idCliente,$tipo);
}
?>
<h2>Formulário de Itens Pedido</h2>
<form action="" method="post">
<div>
        <label for="id">Id :</label>
        <input type="text" value="<?=$itenspedido['id']?>" name="id" id="id" size="5">
    </div>
    <div>
        <label for="quantidade">Quantidade :</label>
        <input type="text" name="quantidade" id="quantidade">
    </div>
    <div>
        <label for="valor">Valor:</label>
        <input value="<?=$itenspedido['valor']?>" type="text" name="valor" id="valor">
    </div>
    <button type="submit" name="alterar">Alterar</button>
</form>
<script src="../js/menu.js"></script>
<?php 
require "../rodape.php";
 ?>