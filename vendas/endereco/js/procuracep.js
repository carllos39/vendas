"use strict";
/*seleciona os elementos que serão manipulados */
const formulario=document.querySelector("form");
const campoCep=document.querySelector("#cep");
const campoEndereco=document.querySelector("#endereco");
const campoBairro=document.querySelector("#bairro");
const campoCidade=document.querySelector("#cidade");
const campoEstado=document.querySelector("#estado");
const botaoBuscar=document.querySelector("#buscar");
const mensagem=document.querySelector("#status");

$(campoCep).mask("00000-000");

botaoBuscar.addEventListener("click",async function(event){
event.preventDefault();

let cep; 

if(campoCep.value.length !==9){
    mensagem.textContent="Digite um cep válido!";
    mensagem.style.color="purple";
    return;

}else{
    cep=campoCep.value;
}
const url='https://viacep.com.br/ws/${cep}/json/';
const resposta = await fetch(url);
const dados = await resposta.json();

if("erro" in dados){
    mensagem.textContent="Cep inexistente!";
    mensagem.style.color="red";

}else{
    mensagem.textContent="Cep encontrado!";
    mensagem. mensagem.style.color="green";

   
    campoEndereco.value=dados.logradouro;
    campoBairro.value=dados.bairro;
    campoCidade.value=dados.localidade;
    campoEstado.value=dados.dados.uf;

}
});

