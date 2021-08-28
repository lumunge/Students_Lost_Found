
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
<link rel="stylesheet" href="css/found.css">

</head>
<body>
<main>
<ul>
    <li><a href="pendingRequests.php">Lost ids</a></li>
    <li><a href="foundIds.php">Found ids</a></li>
    <li><a href="adminBox.php">Inbox</a></li>
    <li style="float: right;">
    <a href="logout.php">Logout</a>
    </li>
    </ul>

    <div class="container">
<div class="table-responsive">
    <!--Retrieving data to the table from the database.-->
    <?php
    $conn = mysqli_connect("localhost", "root", "", "students_id");
    $query = "SELECT * FROM foundids";
    $query_run = mysqli_query($conn, $query);
    ?>
    <h3 style="text-align: center;">Collected Identification Cards</h3>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"style="color: #fff;">
    <thead>
    <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Registration Number</th>
    <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <!--Table from which values will be retrieved to a text box in register_edit.php-->
    <?php
    if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['firstName']; ?></td>
    <td><?php echo $row['lastName']; ?></td>
    <td><?php echo $row['regNo']; ?></td>
    <td><?php echo $row['date']; ?></td>
    </tr>
    <?php
        }
    } else {
        echo "No record was found";
    }
    ?>
    </tbody>
    </table>
    
    </div>
    </div>  
</main>  
<?php
include 'footer.php';
?>
</body>

<!--Optional Javascript-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>