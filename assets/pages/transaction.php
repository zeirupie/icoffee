<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Icoffe</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/all.css">

    <script src="../js/script.js" defer></script>
</head>
<body>

    <?php  
        session_start();
        include "../../backend/config.php";
    ?>

<header>
        <div class="headerLeft">
            <img src="../images/icoffeelogo-black.png" alt="">
        </div>

        <div class="header-menu">
            <a href="../../" id="home_nav">Home</a>
            <a href="coffees.php" id="coffee_navi">Coffees</a>
            <a href="foods.php" id="foods_navi">Foods</a>
		</div>

        <div class="headerRight">
            <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>

            
            

            <i class="fa fa-bars" id="bars" onclick="openNav()"></i>
        </div>
</header>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <h1>Navigation</h1>
        <hr>
            <a href="../../" id="home_nav">Home</a>
            <a href="coffees.php" id="coffee_navi">Coffees</a>
            <a href="foods.php" id="foods_navi">Foods</a>
            <a href="transaction.php" >My Transctions</a>


        <?php 
            if(!isset($_SESSION['logged_in']))
            {
                echo
                "
                    <h1 class='sidenavh'>Account</h1>
                    <hr>
                    <a href='login.php' id='about_nav'>Login</a>
                    <a href='register.php' id='coffee_navi' >Sign-Up</a>
                ";
            }
        ?>
        

    </div>

    <?php
        include "../js/showmenu.php";
        include "../js/sidebarjs.php";
    ?>


<div class="transaction-cont">
        <h1>Your Transactions:</h1>
    <div class="transaction-content">
        <?php
            include "../../backend/viewTransaction.php";
        ?>
    </div>
</div>



<footer>

    <div class="copyright">
        <p>© 2024 Icoffee.</p>
    </div>
</footer>

</body>
</html>