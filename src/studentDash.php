<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Students Lost and found Ids</title>
    <link rel="stylesheet" href="css/studentDash.css" />
  </head>
  <body>
    <main>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="news.html">News</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="about.php">About</a></li>
        <li style="float: right;" class="trigger">
          <a href="logout.php">Log out</a>
        </li>
      </ul>
      <div class="content">
      <div class="page-header">
        <h3>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Please enter your registration number to search for lost id..</h3>
    </div>
        <h3></h3>
        <form method="POST" action="" class="formation">
          <input
            type="text"
            placeholder="Registration number..."
            name="search"
          />
          <br />
          <button name="submit" class="btn">Search</button>
        </form>

        <?php
$conn = new PDO("mysql:host=localhost;dbname=studentid", 'root', '');

if(isset($_POST["submit"])){
$reg = $_POST["search"];
$sql = $conn->prepare("SELECT * FROM `lostids` WHERE regNo = '$reg'");
        $sql->setFetchMode(PDO:: FETCH_OBJ); $sql-> execute(); if($row =
        $sql->fetch()){ ?>
        <br />
        <br />
        <br />
        <table
          class="table table-bordered"
          id="dataTable"
          width="100%"
          cellspacing="0"
          style="color: #fff;"
        >
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Registration Number</th>
            <th>Date Lost</th>
          </tr>
          <tr>
            <td><?php echo $row->firstName; ?></td>
            <td><?php echo $row->lastName; ?></td>
            <td><?php echo $row->regNo; ?></td>
            <td><?php echo $row->date; ?></td>
          </tr>
        </table>
        <?php
}

else{
echo "No such record in the database! ";
}
}
?>
      </div>
    </main>
    <script src="js/index.js"></script>
  </body>
</html>
