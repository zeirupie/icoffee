<?php
include "config.php";

// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $customer_id = null;
    $customer_name = trim($_POST['customer_name']);
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // Basic validation
    if ($pass !== $confirm_pass) {
        echo "<script>
            alert('Passwords do not match!');
            history.back();
        </script>";
        exit();
    }

    // Check if email already exists
    $check_email = "SELECT email FROM customer_account_tbl WHERE email = ?";
    $stmt = $conn->prepare($check_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Email already exists!');
            history.back();
        </script>";
        exit();
    }

    // Hash password using Argon2id
    $hashed_pass = password_hash($pass, PASSWORD_ARGON2I);

    // Prepare and execute INSERT statement
    $sql = "INSERT INTO customer_account_tbl VALUES (?, ?, ?, ?, ?)";
    
    $qry = $conn->prepare($sql);
    $qry->bind_param("sssss", $customer_id, $customer_name, $gender, $email, $hashed_pass);

    if ($qry->execute()) {
        echo "<script>
            alert('Account Created Successfully!');
            window.location.href='../assets/pages/login.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to create account: " . $conn->error . "');
            history.back();
        </script>";
    }

    $qry->close();
} else {
    // If someone tries to access this file directly without POST data
    header("Location: ../assets/pages/register_form.php");
    exit();
}

$conn->close();
?>