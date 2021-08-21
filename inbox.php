<?php
session_start();
error_reporting(E_ERROR);

require 'dbconfig.php';

if (empty($_SESSION['username'])){
header('location:index.php');
}
?>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: studentLogin.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- sweet alert  -->
<link rel="stylesheet" href="css/sweetalert.css">
<script src="js/sweetalert.js"></script>
<script src="js/jquery.js"></script>
<!-- FontAwesome -->
<link rel="stylesheet" href="css/all.min.css" />
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!--Animate Css-->
<link rel="stylesheet" href="css/animate.min.css" />
<!-- Css -->
<link rel="stylesheet" href="css/inbox.css" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Student Inbox</title>
</head>
<body>
<main></main>

<ul>
        <li><a href="studentDash.php">Home</a></li>
        <li><a href="news.html">News</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li style="float: right;" class="trigger">
          <a href="logout.php">Log out</a>
        </li>
      </ul>
<div class="container">
<div class="table-responsive">
<?php
$conn = mysqli_connect("localhost", "root", "", "studentid");

$query ="SELECT * FROM adminmessages AS a INNER JOIN users AS u ON a.student = u.username WHERE u.username='".$_SESSION['username']."' ORDER BY a.msg_id DESC ";
$query_run = mysqli_query($conn, $query);
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color:#fff;">
<thead>
<tr>
<th>Message Id</th>
<th> Sender </th>
<th>Reply</th>
<th>Date Replied.</th>
</tr>
</thead>
<tbody>

<?php
if(mysqli_num_rows($query_run) > 0)
{
while($row = mysqli_fetch_assoc($query_run))
{
?>
<tr>
<td><?php echo $row['msg_id']; ?></td>
<td><?php echo $row['username'] ?></td>
<td><?php echo $row['message']; ?></td>
<td><?php echo $row['date']; ?></td>
</tr>
<?php
}
}
else
{
echo "No record was found";
}
?>
</tbody>
</table>
</div>




<div id="simplemodal" class = "modal" >
<div class="modal-content bg-dark">
<span class="closeBtn">&times;</span>

<form id="contactForm" action="replymessagescust.php" method="POST" class="form-group">
<label for="">Username</label>
<input type="text" name = "username" class = "form-control" placeholder="username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
<br>
<label for="">Message</label>
<textarea name="message" cols="30" class = "form-control" placeholder="Your Message Here..."></textarea>
<br>
<input type="submit" class="btn btn-outline-info text-light" value="Send Message.">
<input type="reset" class="btn btn-outline-secondary ml-3" value="Reset">
</form>
</div>
</div>

</div>
</section>
</main>

<script src="js/messages.js"></script>
<script src="js/jquery.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
