<?php
    include('functions.php');

    $id = $_GET['id'];

    $query = "SELECT * FROM `lostids` WHERE `id` = '$id';";

    if(count(fetchAll($query)) > 0){
    foreach(fetchAll($query) as $row){
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $regNo = $row['regNo'];

        $query = "INSERT INTO `foundids` (`id`, `firstName`, `lastName`, `regNo`) VALUES (NULL, '$firstName', '$lastName', '$regNo');";
    }

    if(performQuery($query)){
        echo "The update was completed successfully </br>";
    }else{
        echo "An error has occured";
    }

    $query = "DELETE FROM `lostids` WHERE `lostids`.`id` = '$id';";
    if(performQuery($query)){
        echo "Thank you and welcome back";
    }else{
        echo "An error has occured";
    }
}else{
    echo "An Error Occured";
}
?>
<br>
<br>

<a href="pendingRequests.php">Back</a>