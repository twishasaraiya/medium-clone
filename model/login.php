<?php
    include("db.php");
    //var_dump($_GET);
    session_start();
    if(!isset($_SESSION['login'])){
        $name=$_GET['name'];
        $pwd=$_GET['pwd'];
        $_SESSION['login']=$name;
        //var_dump($_SESSION);
        $sql="select * from members where name='$name' and password='$pwd'";
        $result=$conn->query($sql);
        //var_dump($result);
        if($result){
            echo '<script language="javascript">alert("Logged In!!")</script>';
            header("refresh:1 ;url= /website/");
            exit();
        }
        else{
            echo '<script language="javascript">alert("Not a Valid user. Register With Us")</script>';
            header("refresh:1 ;url= ./register.html");
            exit();
        }
    }

    /*CUSTOMER DATABASE
        id int not null auto_increment primary key,
        name varchar(20) not null,
        username varchar(250) not null,
        password varchar(20) not null,
        date timestamp,
        email varchar(250);
*/
    else{
        unset($_SESSION['login']);
        echo '<script language="javascript">alert("Logged Out!!")</script>';
        header("refresh:1 ;url= /website/");
    }
?>
