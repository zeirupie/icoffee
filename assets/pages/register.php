<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign-Up</title>

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
    
        <div class="form-account" style="margin-top:50px;padding-bottom:20px;padding-top:30px">
        <form action="../../backend/register_account.php" method="POST">
            <h1>Create New Account</h1>

            <div class="divname">
                <div class="fname">
                    Full name <br>
                    <input type="text" name="customer_name" required>
                </div>

            </div>

            <div style="margin-left:10px;margin-top:10px;">
                    Gender:
                    <p>
                        <input type="radio" name="gender" value="male" style="margin-left:20px;" checked> Male  
                    </p>
                    <p>
                        <input type="radio" name="gender" value="female" style="margin-left:20px;"> Female
                    </p>
                
            </div>

            <div class="long">
                 Email <br>
                <input type="email" name="email" required>
            </div>

            <div class="long">
                 Password <br>
                <input type="password" name="pass" required>
            </div>

            <div class="long">
                Confirm password <br>
               <input type="password" name="confirm_pass" required>
           </div>

            <div class="div-button">
                <button class="button-39">Create account</button>
            </div>


            <div class="have-acc">Already have an account? <a href="login.php">Login</a></div>
        </form>
    </div>



        <div class="sign-up-page"></div>
           
    </div>

    
</body>
</html>