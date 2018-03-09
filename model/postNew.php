<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="container-fluid jumbotron">
    <?php
    //create database
    /*$sql="CREATE TABLE POST(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(20) NOT NULL,
        title VARCHAR(100) NOT NULL,
        date timestamp default current_timestamp,
        image BLOB,
        body text not null
    )";*/
        if($_SERVER['REQUEST_METHOD']=='POST'){
            include 'db.php';
            //var_dump($_POST);
            session_start();
            $name=$_SESSION['login'];
            $title=mysqli_real_escape_string($conn,$_POST['title']);
            $target_file="C:/wamp/www/website/uploads/".basename($_FILES['image']['name']);
            //var_dump($target_file);
            //var_dump($_FILES['image']);
            $body=mysqli_real_escape_string($conn,$_POST['body']);
            //ERROR HANDLING
            if (empty($title) || empty($body)) {
                header("Location: newPostForm.php?form=empty");
                exit();
            }else{
                if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
                     echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
                }else{
                     echo "Sorry, there was an error uploading your file.";
                     exit();
                }
                echo "<p>".$body."</p>";
                $image=basename($_FILES['image']['name']);
                $sql="INSERT INTO post(name,title,image,body)
                    VALUES('$name','$title','$image','$body');";
                $result=mysqli_query($conn,$sql);
                if($result==false){

                    echo "Error".$conn->error;
                }elseif($result==true){
                    echo "<h3>Posted successfully</h3>";
                    //header("Location: /website/");
                }
            }
        }else{
            header("Location: newPostForm.php?form=empty");
            exit();
        }
        ?>
        <form action='/website/' method='POST'>
        <button class="btn btn-success" type='submit'>View Posts</button></form>
</body>
</html>
