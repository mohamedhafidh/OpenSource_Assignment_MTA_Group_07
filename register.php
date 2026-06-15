<?php
include "db.php";

$message = "";

if (isset($_POST['register'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (full_name, email, password)
            VALUES ('$full_name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        $message = "Account created successfully. You can now login.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Create Account</h2>

    <p class="success"><?php echo $message; ?></p>

    <form method="POST">
        <label>Full Name</label>
        <input type="text" name="full_name" required>

        <label>Email Address</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

</body>
</html>