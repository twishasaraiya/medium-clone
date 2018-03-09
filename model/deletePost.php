<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body class="container-fluid jumbotron">
        <?php
            include('db.php');
            $page_id=$_GET['id'];
            $sql="DELETE FROM POST WHERE id='$page_id'";
            if($conn->query($sql)==true){
                echo "<h3>Post deleted successfully</h3>";
                header("Location: /website/");
            }else{
                echo "Error".$conn->error;
            }
         ?>
    </body>
</html>
