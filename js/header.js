"use strict";

console.log("Javascript is running!");

window.onscroll = function () {
    if ($(this).scrollTop() > 500) { //bottom-half of page
        $("#main-nav").css("border-bottom", "1.2px solid #7e7e7e");
        $("#main-nav").css("background-color", "#fff");
        $("#main-nav a.nav-button").css("color", "#000"); 
        $("#login-button").css("background-color", "#000");
    }
    else { //top-half of page
        $("#main-nav").css("border-bottom", "0");
        $("#main-nav").css("background-color", "transparent");
        $("#main-nav a.nav-button").css("color", "#fff"); 
        $("#login-button").css("background-color", "transparent");
    }
};