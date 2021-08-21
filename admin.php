<?php
// Include config file
require_once "dbconfig.php";
error_reporting(E_ERROR);

// Define variables and initialize with empty values
$firstName = $lastName = $regNo = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['regNo'])){
        $sweet = 'error';
        $feedback = 'Please enter all the details';
    }

// Validate First Name
if(empty(trim($_POST["firstName"]))){
    $sweet = 'error';
    $feedback = 'Enter FirstName.';
}else{
$firstName = trim($_POST["firstName"]);
}

// Validate Last Name
if(empty(trim($_POST["lastName"]))){
    $sweet = 'error';
    $feedback = 'Enter Last Name.';
}else{
$lastName = trim($_POST["lastName"]);
} 

// Validate Registration Number
if(empty(trim($_POST["regNo"]))){
    $sweet = 'error';
    $feedback = 'Enter registration number';
}else{
$regNo = trim($_POST["regNo"]);
} 

// Check input errors before inserting in database
if(empty($sweet)){

// Prepare an insert statement
$sql = "INSERT INTO lostids (firstName, lastName, regNo) VALUES (?, ?, ?)";

if($stmt = mysqli_prepare($conn, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "sss", $param_firstName, $param_lastName, $param_regNo);

// Set parameters
$param_firstName = $firstName;
$param_lastName = $lastName;
$param_regNo = $regNo;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    $sweet = "success";
    $feedback =  "The Identification card was added successfully";
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
<title>Student Lost and Found Ids</title>
<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- sweet alert  -->
<link rel="stylesheet" href="css/sweetalert.css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<!-- Css -->
<link rel="stylesheet" href="css/admin.css">

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
    <li><a href="admin.php">Home</a></li>
    <li><a href="pendingRequests.php">Lost ids</a></li>
    <li><a href="foundIds.php">Found ids</a></li>
    <li><a href="adminBox.php">Inbox</a></li>
    <li style="float: right;">
    <a href="logout.php">Logout</a>
    </li>
    </ul>
<div class="content">
<h2 class="card-title">Student Lost and Found Registration Form.</h2>
<p id="">Enter Identification Card Details</p>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="form-group">
<label>First Name</label>
<input type="text" name="firstName" class="form-control" placeholder="First Name..." value="<?php echo $firstName; ?>">
</div>

<div class="form-group">
<label>Last Name</label>
<input type="text" name="lastName" class="form-control" placeholder="Last Name..." value="<?php echo $lastName; ?>">
</div>

<div class="form-group">
<label>Registration Number</label>
<input type="text" name="regNo" class="form-control" placeholder="Student Reg No..." value="<?php echo $regNo; ?>">
</div> 

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
<input type="reset" class="btn btn-default" value="Reset">
</div>
</form>
</div> 
<footer>All Rights Reserved Copyrights &copy; 2020.</footer>
</div> 
</div>
</div>
</main>  


<!--Optional Javascript-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>