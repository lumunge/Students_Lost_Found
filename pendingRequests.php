<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Bootstrap Stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!--Animate Css-->
  <link rel="stylesheet" href="css/animate.min.css" />
  <!-- Css -->
  <link rel="stylesheet" href="css/pending.css" />
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Pending ids For collection</title>
  </head>
  <body>
  <ul>
    <li><a href="admin.php">Home</a></li>
    <li><a href="pendingRequests.php">Lost ids</a></li>
    <li><a href="foundIds.php">Found ids</a></li>
    <li><a href="adminBox.php">Inbox</a></li>
    <li style="float: right;">
    <a href="logout.php">Logout</a>
    </li>
    </ul>
    <h3>Identification cards pending collection</h3>
    <section class="jumbotron text-center">
      <div class="container">
        <?php
        $query = "SELECT * FROM `lostids`;";
        if(count(fetchAll($query)) >
        0){ foreach(fetchAll($query) as $row){ ?>

        <h1 class="jumbotron-heading">
          <?php echo $row['firstName'],  $row['lastName']; ?>
        </h1>
        <h1 class="jumbotron-heading"><?php echo $row['regNo']; ?></h1>
        <small> Collected on <?php echo $row['date']; ?></small>
        <br>
        <br>
        <a
          href="accept.php?id=<?php echo $row['id'];?>" class="btn"
          >Pending Collection...</a
        >
        
        
        <hr>
        <?php 
               }
            }else{
                echo 'No pending requests';
            }
    ?>
      </div>
    </section>
    <footer>All Rights Reserved Copyrights &copy; 2020.</footer>

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
