<?php
require "../cabecalho.php";
require "../itenspedido/funcao-itenspedido.php";
require "../produto/funcao-produto.php";
require "../funcao-sessao.php";

$id=$_GET['id'];

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];


$produto=buscarUmProduto($conexao,$id);








if(isset($_POST['inserir'])){

    $quantidade=mysqli_real_escape_String($conexao,$_POST['quantidade']);
    $valor=mysqli_real_escape_String($conexao,$_POST['valor']);
    $produto_id=mysqli_real_escape_String($conexao,$_POST['produto_id']);
    $cliente_id=mysqli_real_escape_String($conexao,$_POST['cliente_id']);
    
    inserirItensPedido($conexao,$quantidade,$valor,$produto_id,$cliente_id);
}
?>

<h2>Formulário de Itens Pedidos</h2>

<form action="" method="post">
<div>
        
        <input value="<?=$_SESSION['id']?>" type="hidden" name="cliente_id" id="cliente_id">
    </div>
<div>
        
        <input  value="<?=$produto['id']?>" type="hidden" name="produto_id" id="produto_id">
    </div>
    <div>
        <label for="quantidade">Quantidade :</label>
        <input type="text" name="quantidade" id="quantidade">
    </div>
    <div>
        <label for="valor">Valor :</label>
        <input value="<?=$produto['valor']?>" type="text" name="valor" id="valor">
    </div>
    <button type="submit" name="inserir">Inserir</button>
</form>
<hr>
<?php
$itenspedidos=listarItenspedido($conexao,$idCliente,$tipo);

$produtos=listaItensProduto($conexao);

$valores=calcularItens($conexao,$idCliente,$tipo);




?>
<h3>Lista de Itens Pedidos</h3>
<table>
    <tr>
         <th>Id</th>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>Produto</th>
        <th>cliente</th>
        <?php if($tipo=='admin'){?>
        <th>Ação</th>
        <?php } ?>
        <th>Ação</th>
    </tr>
   
    <?php foreach($itenspedidos as $itens ){?>
        <tr>
            <td><?=$itens['id']?></td>
            <td><?=$itens['quantidade']?></td>
            <td><?=$itens['valor']?></td>
            <td><?=$itens['produto_nome']?></td>
            <td><?=$itens['cliente_nome']?></td>
            <?php  if($tipo=='admin'){?>
            <td><a href="../itenspedido/formulario-altera-itenspedido.php?id=<?=$itens['id']?>">Alterar</a></td>
            <?php } ?>
            <td><a class="excluir" href="excluirItenspedido.php?id=<?=$itens['id']?>">Excluir</a></td>
        </tr>
        <?php } ?> 
    <?php foreach ($valores as $valor) {?>
        <tr>
            <td>R$<?=number_format($valor['valor'],2,".")?></td>
        </tr>
        <?php } ?>
</table>
<script src="../js/confirm.js"></script>
<script src="../js/menu.js"></script>
<?php 
require "../rodape.php";
 ?>
