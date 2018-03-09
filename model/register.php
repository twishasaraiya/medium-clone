<?php
    //var_dump($_POST);
    $name=$_POST['name'];
    $uname=$_POST['username'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $cpwd=$_POST['cpwd'];
    if($name=='' || $uname=="" || $pwd="" || $cpwd="" || $email==""){
        echo '<script language="javascript">alert("Please fill all the fields")</script>';
        header("refresh:1 ;url= ./register.html");
        exit();
    }
    if($pwd!=$cpwd){
        echo '<script language="javascript">alert("Password did not match")</script>';
        header("refresh:1 ;url= ./register.html");
        exit();
    }else{
        include("db.php");
        session_start();
        $_SESSION['login']=$uname;
        //var_dump($_SESSION);
        $sql="INSERT INTO MEMBERS(name,username,password,email) VALUES('$name','$uname','$pwd','$email')";
        $result=$conn->query($sql);
        if($result==false){
            echo "Error".$conn->error;
        }else{
            echo '<script language="javascript">alert("Logged In Successfully!")</script>';
            header("refresh:1 ;url= /website/");
        }
        exit();
    }
 ?>
