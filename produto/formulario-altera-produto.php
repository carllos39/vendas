<?php
require "../cabecalho.php";
require "../produto/funcao-produto.php";
require "../funcao-sessao.php";
$id=$_GET['id'];

$produto=buscarUmProduto($conexao,$id);

if(isset($_POST['alterar'])){
    $id=mysqli_real_escape_String($conexao,$_POST['id']);
    $nome=mysqli_real_escape_String($conexao,$_POST['nome']);
    $descricao=mysqli_real_escape_String($conexao,$_POST['descricao']);
    $valor=mysqli_real_escape_String($conexao,$_POST['valor']);
    

    alterarProduto($conexao,$id,$nome,$descricao,$valor);
}
?>
<h2>Formulário de altera produtos</h2>
<form action="" method="post">
<div>
        <label for="id">Id :</label>
        <input type="text" value="<?=$produto['id']?>" name="id" id="id" size="5">
    </div>
    <div>
        <label for="nome">Nome :</label>
        <input type="text" name="nome" id="nome">
    </div>
    <div>
        <label for="descricao">Descrição :</label>
        <input type="descricao" name="descricao" id="descricao">
    </div>
    <div>
        <label for="valor">Valor :</label>
        <input type="num" name="valor" id="valor">
    </div>
  
    <button type="submit" name="alterar">Alterar</button>
</form>
<script src="../js/menu.js"></script>
<?php 
require "../rodape.php";
 ?>