<?php
require "../cabecalho.php";
require "../cliente/funcao-cliente.php";
require "../funcao-sessao.php";

$idCliente=$_SESSION['id'];
$tipo=$_SESSION['tipo'];

if(isset($_POST['inserir'])){
    $nome=mysqli_real_escape_String($conexao,$_POST['nome']);
    $email=mysqli_real_escape_String($conexao,$_POST['email']);
    $senha=mysqli_real_escape_String($conexao,password_hash($_POST['senha'],PASSWORD_DEFAULT));
    $tipo=mysqli_real_escape_String($conexao,$_POST['tipo']);

    inserirCliente($conexao,$nome,$email,$senha,$tipo);
}
?>
<h2>Formulário de cliente</h2>
<h2>Bem vindo :<?=$_SESSION['nome']?></h2>
<h2>Seu nível de acesso :<?=$_SESSION['tipo']?></h2>

<?php if($tipo=='admin'){?>
<form action="" method="post">
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
    <button type="submit" name="inserir">Inserir</button>
</form>
<?php } ?>
<hr>
<?php
$clientes=listarCliente($conexao,$idCliente,$tipo);
?>
<h3>Lista de Clientes</h3>
<table>
    <tr>
         <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Tipo</th>
        <?php if($tipo=='admin'){ ?>
        <th>Gerenciar</th>
        <?php } ?>
        <th>Gerenciar</th>
       
    </tr>
    <?php foreach($clientes as $cliente){?>
        <tr>
            <td><?=$cliente['id']?></td>
            <td><?=$cliente['nome']?></td>
            <td><?=$cliente['email']?></td>
            <td><?=$cliente['tipo']?></td>
            <?php if($tipo=='admin'){?>
            <td><a href="formulario-altera.php?id=<?=$cliente['id']?>">Alterar</a></td>
            <?php }?>
            <td><a class="excluir" href="excluirCliente.php?id=<?=$cliente['id']?>">Excluir</a></td>
        </tr>

    <?php } ?>
</table>
<script src="../js/confirm.js"></script>
<script src="../js/menu.js"></script>
<?php 
require "../rodape.php";
 ?>
