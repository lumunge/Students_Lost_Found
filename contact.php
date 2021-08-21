  <?php
  // Initialize the session
  session_start();

  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: index.php");
  exit;
  }
  ?>
  <?php
  $sweet = "";
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Students Account</title>
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
  <link rel="stylesheet" href="css/contact.css" />
  </head>
  <body>
  <main>

  <?php
  // $sweet = "";
  if($sweet == 'error'){
  echo "<script>swal('Error', '".$feedback."')</script>";
  }elseif($sweet == 'success'){
  echo "<script>swal('Success', '".$feedback."')</script>";
  }
  ?>

  <ul>
  <li><a href="studentDash.php">Home</a></li>
  <li><a href="news.html">News</a></li>
  <li><a href="inbox.php">Inbox</a></li>
  <li style="float: right;" class="trigger">
  <a href="logout.php">Log out</a>
  </li>
  </ul>
  <div class="content">
  <h3>Please enter your message below.</h3>

  <form action="studentMessages.php" method="POST" class="formation">
  <label for="">Username</label>
  <input type="text" name = "username" class = "form-control" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
  <br>
  <label for="">Message</label>
  <textarea name="message" cols="30" class = "form-control" placeholder="Your Message Here..."></textarea>
  <br />
  <input type="submit" class="btn btn-outline-info text-light" value="Send Message.">

  </form>
  </div>
  </main>
  <script></script>
  </body>
  </html>
