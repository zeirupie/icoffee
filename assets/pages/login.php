<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/all.css">

    <script src="js/script.js" defer></script>
</head>
<body style="overflow: hidden;">

    <header class="sign-up-header">
        <div class="headerLeft">
            <img src="../images/icoffeelogo-white.png" alt="">
            <a href="../../" id="home_nav">Go to home</a>
        </div>


    </header>


    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <h1>Navigation</h1>
        <hr>
        <a href="#" id="home_nav">Home</a>
        <a href="#coffee_sec" id="coffee_navi">Coffees</a>
        <a href="#foods_section" id="foods_navi">Foods</a>

        <h1 class="sidenavh">Account</h1>
        <hr>
        <a href="login.php" id="about_nav">Login</a>
        <a href="register.php" id="coffee_navi" >Sign-Up</a>

    </div>

    <div class="cont-account">
    
        <div class="form-account">
            <form action="../../backend/login.php" method="POST">
                <h1>Login</h1>

                <div class="long loginput">
                    Email <br>
                    <input type="email" name="email" required>
                </div>

                <div class="long loginput">
                    Password <br>
                    <input type="password" name="pass" required>
                </div>

                <div class="div-button">
                    <button class="button-39" name="login">Login</button>
                </div>


                <div class="have-acc">Don't have an account yet? <a href="register.php">Register</a></div>

            </form>
        </div>


        <div class="sign-up-page"></div>
           
    </div>

    
</body>
</html>