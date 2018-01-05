<?php
if (isset($_POST['submit'])) { // <- Code will run only when the submit button is clicked

    include_once "connection.php";

    session_start();
    $_SESSION['user'] = 'username';
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password)

    // Its always good to prepare your sql statements.
    $prep = $con->prepare("INSERT INTO studenttable (nickname, pass) VALUES (?,?)");

    $stmt = $con->prepare("SELECT nickname FROM studenttable WHERE nickname=?");
    $stmt->bind_param("s", $username);
    //aynı nickname varsa bu şekilde uyarı vermek için kullanabiliriz.

     $sameuser= mysqli_real_escape_string($con, $_POST['username']);
    if (!empty($username))  {
        $result=mysqli_query($con,$stmt);
        $mostrar = $result->num_rows;
         if($mostrar==0){
            // Bind parameters
            $prep->bind_param("ss", $username, $password);

            // Execute the prepared sql statement. This line can even be avoided though
            $send = $prep->execute();

            // Check if the execution was successful
            // Again this check can even be simplified to: if ($send) {...do something;}
            if ($send == TRUE) {
                echo "New record created successfully";    //<-- You won't get to see this because of the next line.
                header('Location: login.html');
                exit();
            } else {
                echo "Error: " . $con->error;
                header('Location: signupsqlerror.html');
                exit();
            }
         }else {
            header('Location: signupdif.html');
            exit();
        }
    }
   $prep->close();
    $con->close();
}
?>
