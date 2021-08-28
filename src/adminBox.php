<?php
session_start();
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
    <link rel="stylesheet" href="css/adminBox.css" />
    </head>
  </head>
  <body>

  <ul>
    <li><a href="pendingRequests.php">Lost ids</a></li>
    <li><a href="foundIds.php">Found ids</a></li>
    <li><a href="adminBox.php">Inbox</a></li>
    <li style="float: right;">
    <a href="logout.php">Logout</a>
    </li>
  </ul>
    <div class="formation">
            <!--Retrieving data to the table from the database.-->
            <?php
$conn = mysqli_connect("localhost", "root", "", "students_id");
$query = "SELECT * FROM studentmessages";
$query_run = mysqli_query($conn, $query);
?>
            <table
              class="table table-bordered"
              id="dataTable"
              width="100%"
              cellspacing="0"
            >
              <thead>
                <tr>
                  <th>Message Id</th>
                  <th>Username</th>
                  <th>Message</th>
                  <th>Time Stamp</th>
                  <th>REPLY</th>
                </tr>
              </thead>
              <tbody>
                <!--Table from which values will be retrieved to a text box in register_edit.php-->
                <?php
if (mysqli_num_rows($query_run) >
                0) {
    while ($row = mysqli_fetch_assoc($query_run)) { ?>
                <tr>
                  <td><?php echo $row['msg_id']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['message']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td>
                    <form action="replymessages.php" method="POST">
                      <input
                        type="hidden"
                        name="edit_id"
                        value="<?php echo $row['id']; ?>"
                      />
                      <button
                        type="submit"
                        name="edit_btn"
                        class="btn btn-success"
                      >
                        REPLY
                      </button>
                    </form>
                  </td>
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
      </div>
    </div>
  </body>
</html>
