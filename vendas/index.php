<?php

require "cabecalho.php";
require "cliente/funcao-cliente.php";
require "funcao-sessao.php";
 

if(isset($_GET['acesso-negado'])){
$mensagem="Você deve se logar primeiro!";
}elseif(isset($_GET['dados-incorretos'])){
    $mensagem="Dados incorretos,verifique!";
}elseif(isset($_GET['sair'])){
    $mensagem="Você saiu do sistema!";
}elseif(isset($_GET['campo-obrigatorio'])){
    $mensagem="Preencha o email e a senha corretamente!";
}


if(isset($_POST['inserir'])){
    
    if(empty($_POST['email'])|| empty($_POST['senha'])){
        header("location: index.php?campo-obrigatorio");
        exit;
    }
    $email=mysqli_real_escape_String($conexao,$_POST['email']);
    $senha=mysqli_real_escape_String($conexao,$_POST['senha']);

 $cliente=buscarCliente($conexao,$email);


 if($cliente !=null && password_verify($senha,$cliente['senha'])){

     login($cliente['id'],$cliente['nome'],$cliente['tipo']);


     header("location:cliente/formulario-cliente.php");
     exit;
}else{
    header("location:index.php?dados-incorretos");
    exit;  
}
}
?>
<h2>Formulário de Login</h2>

<form action="" method="post">
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="senha">Senha :</label>
        <input type="password" name="senha" id="senha">
    </div>
    <button type="submit" name="inserir">Logar</button>
</form>
<?php if(isset($mensagem)){?>
<p class="mensagem"><?=$mensagem?></p>
    <?php }?>
    <script src="js/menu.js"></script>
<?php 
require "rodape.php";
 ?>