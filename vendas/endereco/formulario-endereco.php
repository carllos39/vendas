<?php
require "../cabecalho.php";
require "../endereco/funcao-endereco.php";
require "../funcao-sessao.php";

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];

if(isset($_POST['inserir'])){
    $endereco=mysqli_real_escape_String($conexao,$_POST['endereco']);
    $numero=mysqli_real_escape_String($conexao,$_POST['numero']);
    $bairro=mysqli_real_escape_String($conexao,$_POST['bairro']);
    $cidade=mysqli_real_escape_String($conexao,$_POST['cidade']);
    $estado=mysqli_real_escape_String($conexao,$_POST['estado']);
    $cliente_id=mysqli_real_escape_String($conexao,$_POST['cliente_id']);

    inserirEndereco($conexao,$endereco,$numero,$bairro,$cidade,$estado,$cliente_id,$idCliente,$tipo);
}
?>
<h2>Formulário de endereço</h2>
<form action="" method="post">
<div>
        
        <input type="hidden" value="<?=$_SESSION['id']?>" name="cliente_id" id="cliente">
    </div>
<div>
                    <label for="cep">Informe o cep: <br><span id="status"></span></label>
                    <div id="area-do-cep">
                        <input placeholder="Somente números" type="text" id="cep" name="cep" maxlength="9" inputmode="numeric" required> <br>
                        <button id="buscar">Buscar</button>
                    </div>
                </div>
                <div>
                    <label for="endereco">Endereço:</label>
                    <input readonly type="text" id="endereco" name="endereco" size="30">
                </div>
                <div>
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" size="10">
                </div>
                <div>
                    <label for="bairro">Bairro:</label>
                    <input readonly type="text" id="bairro" name="bairro">
                </div>
                <div>
                    <label for="cidade">Cidade:</label>
                    <input readonly type="text" id="cidade" name="cidade">
                </div>
                <div>
                    <label for="estado">Estado:</label>
                    <input readonly type="text" id="estado" name="estado">
                </div>
    <button type="submit" name="inserir">Inserir</button>
</form>
<hr>
<?php
$enderecos=listarEndereco($conexao,$idCliente,$tipo);
?>
<h3>Lista de enderecos</h3>
<table>
    <tr>
    <th>Id</th>
        <th>Endereco</th>
        <th>Número</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Cliente</th>
        <th>Gerenciar</th>
        <th>Gerenciar</th>
    </tr>
    <?php foreach($enderecos as $endereco){?>
        <tr>
        <td><?=$endereco['id']?></td>
            <td><?=$endereco['endereco']?></td>
            <td><?=$endereco['numero']?></td>
            <td><?=$endereco['bairro']?></td>
            <td><?=$endereco['cidade']?></td>
            <td><?=$endereco['estado']?></td>
            <td><?=$endereco['cliente_nome']?></td>
            <td><a href="formulario-altera-endereco.php?id=<?=$endereco['id']?>">Alterar</a></td>
            <td><a class="excluir" href="excluir-endereco.php?id=<?=$endereco['id']?>">Excluir</a></td>
        </tr>

    <?php } ?>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Importação do plugin/extenção Jquery mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="js/contato.js"></script>
<script src="../js/confirm.js"></script>
<script src="../js/menu.js"></script>

<?php 
require "../rodape.php";
 ?>