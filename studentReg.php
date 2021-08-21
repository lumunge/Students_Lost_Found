<?php
// Include config file
require_once "dbconfig.php";
error_reporting(E_ERROR);

// Define variables and initialize with empty values
$firstName = $lastName = $username = $password = $confirm_password = $sweet = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password'])){
        $sweet = 'error';
        $feedback = 'Please enter all registration details';
    }

    //Validate First Name
if(empty(trim($_POST["firstName"]))){
    $sweet = 'error';
    $feedback = 'Please Enter a First Name';
    }else{
    $firstName = trim($_POST["firstName"]);
    }

    //Validate Last Name
    if(empty(trim($_POST["lastName"]))){
        $sweet = 'error';
        $feedback = 'Please Enter a Last Name';
        }else{
        $lastName = trim($_POST["lastName"]);
        }

// Validate username
if(empty(trim($_POST["username"]))){
    $sweet = 'error';
    $feedback = 'Enter a Username.';
} else{
// Prepare a select statement
$sql = "SELECT id FROM users WHERE username = ?";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_username);

// Set parameters
$param_username = trim($_POST["username"]);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
    $sweet = 'error';
    $feedback = 'This username is already taken try another';
} else{
$username = trim($_POST["username"]);
}
} else{
$feedback =  'Oops! Something went wrong. Please try again later.';
}
}

// Close statement
mysqli_stmt_close($stmt);
}

// Validate password
if(empty(trim($_POST["password"]))){
    $sweet = 'error';
    $feedback = 'Please enter a valid password.';
} elseif(strlen(trim($_POST["password"])) < 6){
    $sweet = 'error';
    $feedback = 'Password must have atleast 6 characters.';
} else{
$password = trim($_POST["password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
    $sweet = 'error';
    $feedback = 'Please confirm your password.';  
} else{
$confirm_password = trim($_POST["confirm_password"]);
if(empty($sweet) && ($password != $confirm_password)){
    $sweet = 'error';
    $feedback = 'Your Password did not match, please try again.';
}
}

// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO users (firstName, lastName, username, password) VALUES (?, ?, ?, ?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ssss", $param_firstName, $param_lastName, $param_username, $param_password);

// Set parameters
$param_firstName = $firstName;
$param_lastName = $lastName;
$param_username = $username;
$param_password = password_hash($password, PASSWORD_DEFAULT);


// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    $sweet = "success";
    $feedback =  "Your Request Will Be Processed Shortly, Please Wait A While And Try To Log In to your Account.";
} else{
    $sweet = 'error';
    $feedback =  "Something went wrong. Please try again later.";
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
<title>Student Registration</title>
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
<!-- <link rel="stylesheet" href="css/customerlogin.css"> -->
<link rel="stylesheet" href="css/studentReg.css">

</head>
<body>
<main>
<?php
// $sweet = "";
if($sweet == 'error'){
    echo '<script>swal("Error", "'.$feedback.'", "error")</script>';
}elseif($sweet == 'success'){
    echo '<script>swal("Success", "'.$feedback.'", "success")</script>';
}
?>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="news.html">News</a></li>
    <li><a href="about.php">About</a></li>
    <li style="float: right;">
    <a href="adminlogin.php">Admin Login</a>
    </li>
    </ul>

<div class="content">
<h3 class="card-title">Student Registration Form.</h3>
<p id="">Please fill in your credentials to register with us</p>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group">
<label>First Name</label>
<input type="text" name="firstName" class="form-control" placeholder="First Name..." value="<?php echo $firstName; ?>">
</div>

<div class="form-group">
<label>Last Name</label>
<input type="text" name="lastName" class="form-control" placeholder="Last Name..." value="<?php echo $lastName; ?>">
</div>  

<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" placeholder="Username..." value="<?php echo $username; ?>">
</div>

    
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
</div>

<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password..." value="<?php echo $confirm_password; ?>">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
<input type="reset" class="btn btn-default" value="Reset">
</div>
<p id="ref">Already have an account? <a href="index.php">Login here</a>.</p>
</form>
</div> 
<p class="futa">All Rights Reserved Copyrights &copy; 2020.</p>
</div> 
</div>
</div>
</main>  


<!--Optional Javascript-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>