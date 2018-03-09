<?php
    $servername='localhost';
    $username='root';
    $password='password';

    $dbname='mydb';
    //Create connection
    $conn=mysqli_connect($servername,$username,$password,$dbname) or die("connection failed");
?>
