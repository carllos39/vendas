"use strict";
const botaoMenu=document.querySelector("nav h2");
const menu=document.querySelector(".menu");
const textoBotao=botaoMenu.querySelector("a");

botaoMenu.addEventListener("click", function(event){
    event.preventDefault();
    menu.classList.toggle("aberto");

    if(menu.classList.contains("aberto")){
    textoBotao.innerHTML="Fechar &times;";
    }else{
        textoBotao.innerHTML="Menu &equiv;";
    }
});