<?php
    include_once "connection.php";

    if(isset($_POST["username"]) && isset($_POST["subject"]) && isset($_POST["course"])){

        $nick = $_POST["username"];
        $subject=$_POST["subject"];
        $course=$_POST["course"];
        echo "$nick - $subject - $course";
        $prep = $con->prepare("DELETE FROM enrolledtable WHERE nickname=? AND subject=? AND course=?");

        $prep->bind_param("sss", $nick, $subject, $course);
        $send = $prep->execute();

        if ($send == TRUE) {
            echo "Courses deleted successfully";
            //header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $con->error;
            //header('Location: index.php');
            exit();
        }
      }
 ?>
