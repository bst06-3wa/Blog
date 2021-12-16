"use strict";

let menuDeroulant = document.getElementById("arrow");

menuDeroulant.addEventListener("mouseenter", function(){
    menuDeroulant.classList.remove("fa-arrow-right");
    menuDeroulant.classList.add("fa-arrow-down");
})

menuDeroulant.addEventListener("mouseleave", function(){
    menuDeroulant.classList.add("fa-arrow-right");
    menuDeroulant.classList.remove("fa-arrow-down");
})