<?php
require "../cabecalho.php";
require "../endereco/funcao-endereco.php";
require "../funcao-sessao.php";
$id=$_GET['id'];

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];

$produto=buscarUmEndereco($conexao,$id,$idCliente,$tipo);

if(isset($_POST['alterar'])){
    
    $endereco=mysqli_real_escape_String($conexao,$_POST['endereco']);
    $numero=mysqli_real_escape_String($conexao,$_POST['numero']);
    $bairro=mysqli_real_escape_String($conexao,$_POST['bairro']);
    $cidade=mysqli_real_escape_String($conexao,$_POST['cidade']);
    $estado=mysqli_real_escape_String($conexao,$_POST['estado']);
    $cliente_id=mysqli_real_escape_String($conexao,$_POST['cliente_id']);
    

    alterarEndereco($conexao,$id,$endereco,$numero,$bairro,$cidade,$estado,$cliente_id,$idCliente,$tipo);
}
?>
<h2>Formulário de altera endereco</h2>
<form action="" method="post">
<div>
        
        <input type="text" value="<?=$_SESSION['id']?>" name="cliente_id" id="cliente">
    </div>
<div>
                    <label for="cep">CEP: <br><span id="status"></span></label>
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
                    <label for="numero">numero:</label>
                    <input type="text" id="numero" name="numero" size="30">
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
    <button type="submit" name="alterar">Alterar</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Importação do plugin/extenção Jquery mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="js/contato.js"></script>
<script src="../js/menu.js"></script>

<?php 
require "../rodape.php";
 ?>