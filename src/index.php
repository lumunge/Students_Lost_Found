<?php
// Initialize the session
session_start();

// // Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
// header("location: studentDash.php");
// exit;
// }

// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$username = $password = $sweet = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $sweet = 'error';
        $feedback = 'Please enter your Username to login';
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $sweet = 'error';
        $feedback = 'Please enter your Password';
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($sweet)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: studentDash.php");
                        } else {
                            // Display an error message if password is not valid
                            $sweet = 'error';
                            $feedback = 'The password you entered was not valid.';
                        }
                    }
                }
            } else {
                $sweet = 'error';
                $feedback = 'Oops! Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Login Page |</title>
<?php
    include "styles.php"
?>
</head>
<body>
<main>
<?php include "header.php" ?>
<?php
if ($sweet == 'error') {
    echo "<script>swal('Error', '".$feedback."')</script>";
} elseif ($sweet == 'success') {
    echo "<script>swal('Success', '".$feedback."')</script>";
}
?>
<div class="content">
<h3>Student Login Form.</h3>
<p>Please fill in your credentials to login.</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
</div> 

<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<div class="form-group ">
<input type="submit" class="btn" value="login">
<p class="regLink">Don't Have An Account? <a href="studentReg.php">Sign Up here.</a></p>  
</div>
</form>


</div>
<?php
include 'footer.php';
?>
</div>
</div>
</main>  

<!--Optional Javascript-->
<?php include "javascript.php" ?>
</body>
</html>