<?php
if(isset($_GET['sair'])){
    session_destroy();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <h1><a href=""></a>Vendas de Produtos</h1>
        <nav>
            <h2><a href="">Menu &equiv;</a></h2>
            <ul class="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../cliente/formulario-cliente.php">Formulário de Clientes</a></li>
                <li><a href="../produto/formulario-produto.php">Formulário de Produtos</a></li>
                <li><a href="../endereco/formulario-endereco.php">Formulário de endereços</a></li>
                <li><a href="../index.php">Sair</a></li>
            </ul>
        </nav>
    </header>




    
