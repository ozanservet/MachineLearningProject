<?php
    include_once "connection.php";

    if(isset($_POST["username"]) && isset($_POST["subject"]) && isset($_POST["course"]) && isset($_POST["grade"])){

        $nick = $_POST["username"];
        $subject=$_POST["subject"];
        $course=$_POST["course"];
        $grade=$_POST["grade"];
        echo "$nick - $subject - $course - $grade";
        $prep = $con->prepare("INSERT INTO `enrolledtable`(`nickname`, `subject`, `course`, `grade`) VALUES(?,?,?,?)");
        $prep->bind_param("ssss", $nick, $subject, $course, $grade);
        $send = $prep->execute();

        if ($send == TRUE) {
            echo "Courses added successfully";
            //header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $con->error;
            //header('Location: index.php');
            exit();
        }
      }
 ?>
