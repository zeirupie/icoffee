var home_nav = document.getElementById("home_nav");
var about_nav = document.getElementById("about_nav");
var coffee_navi = document.getElementById("coffee_navi");
var foods_nav = document.getElementById("foods_navi");
var contact_nav = document.getElementById("contact_navi");

var about_us = document.getElementById("about_us").offsetTop;
var coffee_section = document.getElementById("coffee_sec").offsetTop;
var foods_section = document.getElementById("foods_section").offsetTop;
var contact_us = document.getElementById("contact_section").offsetTop;

home_nav.style.color = "#D2691E"

window.onscroll = function ()
{

    if ( window.scrollY < about_us)
    {
        home_nav.style.color = "#D2691E"
        about_nav.style.color = "black"
        coffee_navi.style.color = "black"
        foods_nav.style.color = "black"
        contact_nav.style.color = "black"
    }

    if ( window.scrollY >= about_us - 70 && window.scrollY < coffee_section - 70)
    {
        home_nav.style.color = "black"
        about_nav.style.color = "#D2691E"
        coffee_navi.style.color = "black"
        foods_nav.style.color = "black"
        contact_nav.style.color = "black"
    }
    

    else if ( window.scrollY >= coffee_section - 200 && window.scrollY < foods_section - 200)
    {
        home_nav.style.color = "black"
        about_nav.style.color = "black"
        coffee_navi.style.color = "#D2691E"
        foods_nav.style.color = "black"
        contact_nav.style.color = "black"
    }

    else if ( window.scrollY >= foods_section - 70 && window.scrollY < contact_us - 70)
    {
        home_nav.style.color = "black"
        about_nav.style.color = "black"
        coffee_navi.style.color = "black"
        foods_nav.style.color = "#D2691E"
        contact_nav.style.color = "black"
    }

    else if ( window.scrollY >= contact_us - 70)
    {
        home_nav.style.color = "black"
        about_nav.style.color = "black"
        coffee_navi.style.color = "black"
        foods_nav.style.color = "black"
        contact_nav.style.color = "#D2691E"
    }
    
}

function openNav() 
{
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("mySidenav").style.boxShadow = " 0 0 0 1000px rgba(0, 0, 0, 0.5)"
}

function closeNav() 
{
    document.getElementById("mySidenav").style.boxShadow = " 0 0 0 0 rgba(0, 0, 0, 0.5)"
    document.getElementById("mySidenav").style.width = "0";
}