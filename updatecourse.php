<?php
    include_once "connection.php";

    if(isset($_POST["username"]) && isset($_POST["subject"]) && isset($_POST["course"]) && isset($_POST["grade"])){

        $nick = ($_POST["username"]);
        $subject=($_POST["subject"]);
        $course=($_POST["course"]);
        $grade=$_POST["grade"];
        echo "$nick - $subject - $course - $grade";
        $prep = $con->prepare("UPDATE enrolledtable SET grade=? WHERE nickname=? AND subject=? AND course=?");

        $prep->bind_param("ssss", $grade, $nick, $subject, $course);
        $send = $prep->execute();

        if ($send == TRUE) {
            echo "Courses updated successfully";
            //header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $con->error;
            //header('Location: index.php');
            exit();
        }
      }
 ?>
