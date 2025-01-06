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

const profile = document.getElementById("profile");
const profile_menu = document.getElementById("profile_menu");

profile.onpointerover= function()
{
    if(profile_menu.style.display == "" || profile_menu.style.display == "none")
    {
        profile_menu.style.display = "block";
        profile_menu.style.backgroundImage="url(images/category-1.jpg)";
    }

}

profile.onpointerleave= function()
{
    profile_menu.style.display = "none";
}

profile_menu.onpointerover= function()
{
    if(profile_menu.style.display == "" || profile_menu.style.display == "none")
    {
        profile_menu.style.display = "block";
        profile_menu.style.backgroundImage="url(images/category-1.jpg)";
    }

}

profile_menu.onpointerleave= function()
{
    profile_menu.style.display = "none";
}

profile.onclick= function()
{
    if(profile_menu.style.display == "" || profile_menu.style.display == "none")
    {
        profile_menu.style.display = "block";
        profile_menu.style.backgroundImage="url(images/category-1.jpg)";
    }

    else
    {
        profile_menu.style.display = "none";
    }
}
