<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Icoffe</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/all.css">

    <script src="assets/js/script.js" defer></script>
</head>
<body>
    <?php  
        session_start();
        include "backend/config.php";
    ?>

    <header>
        <div class="headerLeft">
            <img src="assets/images/icoffeelogo-black.png" alt="">
        </div>

        <div class="header-menu">
			<a href="#" id="home_nav">Home</a>
			<a href="#about_us" id="about_nav">About</a>
			<a href="#coffee_sec" id="coffee_navi">Coffees</a>
			<a href="#foods_section" id="foods_navi">Foods</a>
            <a href="#contact_section" id="contact_navi">Contact</a>
		</div>

        <div class="headerRight">
            <a href="assets/pages/transaction.php" class="mt" style="text-decoration:none;"><h4 style="color:gray;">My Transctions</h4></a>
            <a href="assets/pages/cart.php"><i class="fa fa-shopping-cart"></i></a>

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
                                <a href='assets/pages/login.php' id='about_nav'><button class='button-59' role='button'>Login</button></a>
                                <a href='assets/pages/register.php' id='coffee_navi'><button class='button-59 primary-btn' role='button'>Sign-Up</button></a>
                            </div>
                        ";
                    }

            ?>

<i class="fa fa-bars" id="bars" onclick="openNav()"></i>
        </div>
    </header>

    <?php
        include "assets/js/sidebarjs.php"
    ?>

        <div class="menu-profile" id="profile_menu">
            <a href="backend/logout.php"><button>Logout</button></a>
        </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <h1>Navigation</h1>
        <hr>
        <a href="#" id="home_nav">Home</a>
        <a href="#about_us" id="about_nav">About</a>
        <a href="#coffee_sec" id="coffee_navi">Coffees</a>
        <a href="#foods_section" id="foods_navi">Foods</a>
        <a href="#contact_section" id="contact_navi">Contact</a>
        <a href="assets/pages/transaction.php" id="contact_navi">My Transctions</a>


        <?php 
            if(!isset($_SESSION['logged_in']))
            {
                echo
                "
                    <h1 class='sidenavh'>Account</h1>
                    <hr>
                    <a href='assets/pages/login.php' id='about_nav'>Login</a>
                    <a href='assets/pages/register.php' id='coffee_navi' >Sign-Up</a>
                ";
            }
        ?>
        

    </div>
    

    <div class="hero">
        <div class="hero-cont">
            <h1>Experience Premium <span class="highlight-text">Coffee</span> <span class="highlight-text2">Every Day</span></h1>
            <p>From carefully selected beans to expertly crafted brews, we bring you the perfect cup of coffee to start your day right.</p>
            <a href="assets/pages/coffees.php"><button>Order Now</button></a>
        </div>
    </div>

    <div class="about" id="about_us">
        <div class="home-title">
            <div class="two-cont">
                <div class="two order1">
                    <h1>About Us</h1>
                    <h1 class="main-title">Your Daily Dose of Premium Coffee</h1>
                    <p>Welcome to I Coffee, where passion meets perfection in every cup. Our expert baristas craft each beverage with precision and care, using only the finest beans sourced from sustainable farms worldwide. Experience the art of coffee making in a warm, inviting atmosphere designed for coffee lovers.</p>
                    <a href="#"><button class="button-59" role="button"><i class="fab fa-facebook" style="font-size: 40px;color:blue;margin-right:10px;"></i>Visit us on facebook</button></a> 
                </div>

                <div class="two order2">
                    <img src="assets/images/about-3.avif" >
                </div>
            </div>
        </div>
    </div>
    <div class="coffees" id="coffee_sec">
        <div class="title-more">
            <div class="title-two">
                <h1>Coffees</h1>
                <h1 class="main-title">Discover Your New Favorite Brew</h1>
            </div>

            <div class="title-two">
                <a href="assets/pages/coffees.php"><button class="button-59" role="button">See more</button></a>
            </div>
        </div>

        <div class="coffee-cont">
            <?php 
                include "backend/coffeeCard.php";
            ?>
            
        </div>
    </div>

    <div class="foods" id="foods_section">
        <div class="title-more">
            <div class="title-two">
                <h1>foods</h1>
                <h1 class="main-title">Perfect Pairing for Your Coffee</h1>
            </div>
    
            <div class="title-two tempfood">
                <a href="assets/pages/foods.php"><button class="button-59" role="button">See more</button></a>
            </div>
        </div>
    
        <div class="food-cont">
            <?php
                include "backend/foodCard.php";
            ?>

        </div>
    </div>

    <div class="contact" id="contact_section">
        <div class="contact-cont">
            <h1 class="sub-mtitle">Contact</h1>
            <h1 class="main-title">Get in Touch</h1>
            <p class="con-text">Reach out to us for any questions or concerns.</p>

            <div class="contact-two-cont">
                <div class="contact-two order1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6429.326226011035!2d123.25404625092914!3d9.237339301304884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab67df3e7043bb%3A0x61b325c200a5cf7a!2sBacong%2C%20Negros%20Oriental!5e0!3m2!1sen!2sph!4v1734511430241!5m2!1sen!2sph" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
    
                <div class="contact-two contact-text order2">
                    <div class="contact-two-one">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <h1>Loction:</h1>
                            <p>Bacong City</p>
                        </div>
                    </div>

                    <div class="contact-two-one">
                        <i class="fa fa-envelope"></i>
                        <div>
                            <h1>Email:</h1>
                            <p>icoffee@gmail.com</p>
                        </div>
                    </div>

                    <div class="contact-two-one">
                        <i class="fa fa-phone"></i>
                        <div>
                            <h1>Call:</h1>
                            <p>+631234567</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>

        <div class="copyright">
            <p>© 2024 Icoffee.</p>
        </div>
    </footer>

    
</body>
</html>