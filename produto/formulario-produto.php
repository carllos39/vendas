<?php
require "../cabecalho.php";
require "../produto/funcao-produto.php";
require "../funcao-sessao.php";

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];




if(isset($_POST['inserir'])){
    $nome=mysqli_real_escape_String($conexao,$_POST['nome']);
    $descricao=mysqli_real_escape_String($conexao,$_POST['descricao']);
    $valor=mysqli_real_escape_String($conexao,$_POST['valor']);
    
    

    inserirProduto($conexao,$nome,$descricao,$valor);
}

?>

<h2>Formulário de produtos</h2>
<?php if($tipo=='admin'){?>
    <?php if($tipo=='admin'){?>
<form action="" method="post">
    
    <div>
        <label for="nome">Nome :</label>
        <input type="text" name="nome" id="nome">
    </div>
    <div>
        <label for="descricao">Descrição :</label>
        <input type="text" name="descricao" id="descricao">
    </div>
    <div>
        <label for="valor">Valor :</label>
        <input type="num" name="valor" id="valor">
    </div>
    <button type="submit" name="inserir">Inserir</button>
</form>
    <?php } ?>
<?php } ?>
<hr>
<?php
$produtos=listarProduto($conexao);



?>
<h3>Lista de Produtos</h3>
<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Valor</th>
        <?php if($tipo=='admin'){?>
        <th>Gerenciar</th>
        <th>Gerenciar</th>
        <?php } ?>
        <th>Produtos do pedido</th>
    </tr>
    <?php foreach($produtos as $produto){?>
        <tr>
            <td><?=$produto['id']?></td>
            <td><?=$produto['nome']?></td>
            <td><?=$produto['descricao']?></td>
            <td><?=$produto['valor']?></td>
            <?php if($tipo=='admin'){?>
            <td><a href="formulario-altera-produto.php?id=<?=$produto['id']?>">Alterar</a></td>
            <td><a class="excluir" href="excluirProduto.php?id=<?=$produto['id']?>">Excluir</a></td>
            <?php }?>
            <td><a href="../itenspedido/formulario-itenspedido.php?id=<?=$produto['id']?>">Inserir no Pedido</a></td>
        </tr>
    <?php } ?>
   
   

</table>
<?php 
?>
<script src="../js/confirm.js"></script>
<script src="../js/menu.js"></script>
<?php 
require "../rodape.php";
 ?>
