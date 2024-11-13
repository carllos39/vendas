<?php
require "../cabecalho.php";
require "../cliente/funcao-cliente.php";
require "../funcao-sessao.php";
$id=$_GET['id'];

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];

$cliente=buscarUmCliente($conexao,$id,$idCliente,$tipo);

if(isset($_POST['alterar'])){
    $nome=mysqli_real_escape_String($conexao,$_POST['nome']);
    $email=mysqli_real_escape_String($conexao,$_POST['email']);
    $senha=mysqli_real_escape_String($conexao,password_hash($_POST['senha'],PASSWORD_DEFAULT));
    $tipo=mysqli_real_escape_String($conexao,$_POST['tipo']);
    
    alterarCliente($conexao,$id,$nome,$email,$senha,$idCliente,$tipo);
}
?>
<h2>Formulário de altera cliente</h2>
<form action="" method="post">
<div>
        <label for="id">Id :</label>
        <input type="text" value="<?=$cliente['id']?>" name="id" id="id" size="5">
    </div>
    <div>
        <label for="nome">Nome :</label>
        <input type="text" name="nome" id="nome">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="senha">Senha :</label>
        <input type="password" name="senha" id="senha">
    </div>
    <div>
        <label for="nivel">Nível acesso :</label>
    <select name="tipo" id="tipo">
    <option value=""></option>
        <option value="admin">Administrador</option>
        <option value="visitante">Visitante</option>
    </select>
    </div>
    <button type="submit" name="alterar">Alterar</button>
</form>
<script src="../js/menu.js"></script>
<?php 
require "../rodape.php";
 ?>