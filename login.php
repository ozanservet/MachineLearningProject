<?php
  include_once "connection.php";
  if (isset($_POST['submit'])) { // <- Code will run only when the submit button is clicked

    session_start();
/*
      session_start();
      $_SESSION['user'] = 'username';
      $username = $_POST['username'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password)
      echo "$username $password";
      $sql = mysqli_query("SELECT * FROM studenttable WHERE nickname='$username' AND pass='$password'");
      while ($row = mysql_fetch_array($sql)){
      $username, $password = $row['username', 'password'];
      $password = $row['password'];
      //we will echo these into the proper fields
      }
      */
      if($_POST['username'] && $_POST['password']) {
      	$username  =  $_POST['username'];
        $pa = $_POST['password'];
        //$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password)

      	$pas = "SELECT pass FROM studenttable WHERE nickname='$username'";


         $result = mysqli_query($con, $pas) or die("Error: ".mysqli_error($con));  // assign the return value of mysqli_query to $res
           if($result === FALSE) {
                die(mysql_error()); // TODO: better error handling
            }else{
                if(mysqli_num_rows($result) != 0){

                  while ($row = $result->fetch_assoc()) {
                      $pass = $row['pass'];
                  }

                   echo "pass: $pass ----------------- <br>";
                   if(password_verify($pa , $pass)){
                     echo "login successfully";
                     $_SESSION['username'] = $username;
                     header('Location: index.php');
                    }
                    else {
                      echo "wrong password";
                      header('Location: logindif.html');
                    }
                }
          }


      	/*$count_user = mysqli_num_rows($res);
      	if($count_user==1)
      	{
      		$row = mysqli_fetch_array($res);
      		$_SESSION['username'] = $row['username'];
      		$_SESSION['password'] = $row['password'];
      		header("location:dashboard.php?success=1");
      	}else{
      			$error = 'Incorrect Username, Password and Branch.';
      		}*/
      }
}
?>
