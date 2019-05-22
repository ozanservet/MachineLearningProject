<?php
    include_once "connection.php";

    if(isset($_POST["username"]) && isset($_POST["feedback"])){

        $nick = $_POST["username"];
        $feedback=$_POST["feedback"];
        echo "$nick - $feedback";
        $prep = $con->prepare("UPDATE `studenttable` SET `feedback`=? WHERE `nickname`=?");
        $prep->bind_param("ss", $feedback, $nick);
        $send = $prep->execute();

        if ($send == TRUE) {
            echo "Feedback added successfully";
            //header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $con->error;
            //header('Location: index.php');
            exit();
        }
      }
 ?>
