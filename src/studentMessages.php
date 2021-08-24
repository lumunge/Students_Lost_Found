<?php
// Include config file
require_once "dbconfig.php";

// Define variables and initialize with empty values
$username = $message = $sweet = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['username']) || empty($_POST['message'])){
        $sweet = 'error';
        $feedback = 'Please fill in all details.';
    }

    if (isset($_POST['username'])) {
      $username = $_POST['username'];
    }
    if (isset($_POST['message'])) {
      $message = $_POST['message'];
    }


// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO studentmessages (username, message) VALUES (?, ?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_message);

// Set parameters
$param_username = $username;
$param_message = $message;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Redirect to login page
$sweet = 'success';
$feedback = 'Your Message Was Sent Successfully, Thank you for your feedback.';
} else{
  $sweet = 'error';
$feedback = 'Something went wrong. Please try again later.';
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reply Messages.</title>
  <!-- sweet alert  -->
<link rel="stylesheet" href="css/sweetalert.css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/all.min.css" />
<style>
body{
  background: #fff;
}
</style>
</head>
<body>
<?php
// $sweet = "";
if($sweet == 'error'){
    echo "<script>swal('Error', '".$feedback."')</script>";
}elseif($sweet == 'success'){
    echo "<script>swal('Success', '".$feedback."')</script>";
}
?>
<a href="studentDash.php">DashBoard
  <br><i class="fa fa-arrow-left fa-4x"></i></a>
</body>
</html>