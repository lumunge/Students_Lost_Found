<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
header("location: studentDashBoard.php");
exit;
}

// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$firstName = $password = $sweet = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty
if(empty(trim($_POST["firstName"]))){
    $sweet = 'error';
    $feedback = 'Please enter your Username to login';
} else{
$firstName = trim($_POST["firstName"]);
}

// Check if password is empty
if(empty(trim($_POST["password"]))){
    $sweet = 'error';
    $feedback = 'Please enter your Password';
} else{
$password = trim($_POST["password"]);
}

// Validate credentials
if(empty($sweet)){
// Prepare a select statement
$sql = "SELECT id, firstName, password FROM users WHERE firstName = ?";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_firstName);

// Set parameters
$param_firstName = $firstName;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Store result
mysqli_stmt_store_result($stmt);

// Check if username exists, if yes then verify password
if(mysqli_stmt_num_rows($stmt) == 1){                    
// Bind result variables
mysqli_stmt_bind_result($stmt, $id, $firstName, $hashed_password);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){
// Password is correct, so start a new session
session_start();

// Store data in session variables
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $id;
$_SESSION["firstName"] = $firstName;                            

// Redirect user to welcome page
header("location: studentDash.php");
} else{
// Display an error message if password is not valid
$sweet = 'error';
$feedback = 'The password you entered was not valid.';
}
}
}
} else{
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
<title>Client Login Page |</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- sweet alert  -->
<link rel="stylesheet" href="css/sweetalert.css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css">
<!-- Css -->
<link rel="stylesheet" href="css/customerlogin.css">
</head>
<body>
<main>


<?php
if($sweet == 'error'){
    echo "<script>swal('Error', '".$feedback."')</script>";
}elseif($sweet == 'success'){
    echo "<script>swal('Success', '".$feedback."')</script>";
}
?>

<a href="a.home.php"><img src="img/logo.png" alt=""></a>

<div class="formation">
    <h2>Customer Login Form.</h2>
<p>Please fill in your credentials to login.</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="form-group">
<label>Username</label>
<input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
</div> 

<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Login">
</div>
<p>Don't have an account? <a href="studentReg.php">Sign up now</a>.</p>
</form>


</div>
</div>
<p class="futa">All Rights Reserved Copyrights &copy; mafundiservices 2019.</p>
</div>
</div>
</main>  

<!--Optional Javascript-->
<script src="js/jquery.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>