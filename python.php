<?php
if(isset($_POST["username"])){
    $nick = $_POST["username"];
    echo shell_exec("C:\Python35\python.exe new.py $nick 2>&1");
}
?>
