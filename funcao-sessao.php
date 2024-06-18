<?php
if(! isset($_SESSION)){
    session_start();
}
function verificaAcesso(){
    if(! isset($_SESSION['id'])){
   session_destroy();
   header("Location:../index.php?acesso-negado");
   exit;
    }
}
function login($id,$nome,$tipo){
    $_SESSION['id']=$id;
    $_SESSION['nome']=$nome;
    $_SESSION['tipo']=$tipo;
}
function logout(){
    session_destroy();
    header("Location:../index.php?saiu");
    exit;

}

function verificaTipo(){
    if($_SESSION['tipo'!= 'admin']){
        header("Location:nao-autorizado.php");
        exit;
}
}
?>