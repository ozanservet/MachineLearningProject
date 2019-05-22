<?php
    $con = mysqli_connect('localhost', 'root', '123456', 'inputdatabase');
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect:".mysqli_connect_errno();
    }
?>
