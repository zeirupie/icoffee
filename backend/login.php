<?php

include "config.php";
session_start();


$conn = new mysqli(host, username, password, dbname);


if(isset($_POST['login'])) //if the button from auth/login.php is clicked
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT pass FROM customer_account_tbl where email= ?"; //get the password from table with email tht is equal to email that got from auth/login
    $qry = $conn->prepare($sql); //preparing query
    $qry->bind_param("s", $email); // puting the value of the email that gpt from auth/login to replace the ? the query stetement 
    $qry->execute(); 
    $qry->store_result(); 

    if($qry->num_rows == 1) // if the found row is 1 meaning only one user that is using the email
    {
        $qry->bind_result($hashed_pass); //making a variable to contain the pass that is prom database
        $qry->fetch();

        if(password_verify($pass, $hashed_pass)) //verifying if the inputted pass is = to the pass that is recorded to the database
        {
            $_SESSION['logged_in'] = true; //if passwords are the same, make a session logged in
            $_SESSION['email']=$email; // make a session variable for email to use use it letter in oother pages
            echo
            "
            <script>
                window.location.href='../index.php'; 
            </script>
            ";// then go to the main page
            exit();
        }

        else
        {
            echo 
            "
            <script>
                history.back();
                alert('Invalid password');
            </script>
            ";//if not same pass from database
            exit();
        }

    }

    else
    {
        echo
        "
            <script>
                history.back();
                alert('Invalid Email');
            </script>
            ";
            exit();// if no account or eail like the inputed email from the database
    }

}

$conn->close();

?>
