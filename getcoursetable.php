<?php
  header('Content-Type: application/json');
      include_once "connection.php";

      if(isset($_POST["username"])){
        $nick = $_POST["username"];

        $prep = "SELECT subject,course,grade FROM `enrolledtable` WHERE nickname='$nick'";

        $results = mysqli_query($con, $prep);

        $jsonData = array();
        while ($row = $results->fetch_row()) {
            $jsonData[] = $row;
        }
        echo json_encode($jsonData);
      }
 ?>
