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
        <a href="assets/pages/transaction.php" class="mt" style="text-decoration:none;"><h4 style="color:gray;">My Transctions</h4></a>
            <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>

            <?php

                if(isset($_SESSION['logged_in']))
                {

                    $check_name = "SELECT customer_name FROM customer_account_tbl WHERE email = ?";
                    $stmt = $conn->prepare($check_name);
                    $stmt->bind_param("s", $_SESSION['email']);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {

                        $stmt->bind_result($cus_name);
                        $stmt->fetch();

                        echo
                        "
                            <div class='profile' id='profile' style='cursor:pointer;display:flex;justify-content:center;align-items:center;'>
                                <h3 style='margin-right:10px;color:gray;'>".$cus_name."</h3>
                                <i class='fa fa-user-circle' style='font-size:25px'></i>

                            </div>
                        ";
                        
                    }
                }
                else
                    {
                        echo
                        "
                            <div class='header-btns'>
                                <a href='login.php' id='about_nav'><button class='button-59' role='button'>Login</button></a>
                                <a href='register.php' id='coffee_navi'><button class='button-59 primary-btn' role='button'>Sign-Up</button></a>
                            </div>
                        ";
                    }

            ?>
            

<i class="fa fa-bars" id="bars" onclick="openNav()"></i>
        </div>
    </header>

        <div class="menu-profile" id="profile_menu">
            <a href="../../backend/logout.php"><button>Logout</button></a>
        </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <h1>Navigation</h1>
        <hr>
            <a href="../../" id="home_nav">Home</a>
            <a href="coffees.php" id="coffee_navi">Coffees</a>
            <a href="foods.php" id="foods_navi">Foods</a>
            <a href="transaction.php" id="foods_navi">My transaction</a>


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
    <div class="coffees" id="coffee_sec">

        <div class="title-two" style="margin-top: 50px;text-align: center;">
            <h1>Foods</h1>
            <h1 class="main-title">Perfect Pairing for Your Coffee</h1>
        </div>

        <div class="coffee-cont">
            <?php
                include "../../backend/foodall.php"
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