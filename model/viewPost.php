<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel='stylesheet' type='text/css' href='/website/css/viewPost.css'>
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

    </head>
    <body class="wrapper">
        <?php
            include 'db.php';
            include 'header.php';
            //echo "you can now update and delete the post";
            //get the parameter value echo $_GET['id'];
            $page_id=$_GET['id'];
            ?>
                <a href="/website/">Home</a>
            <?php
            $sql="SELECT * FROM POST WHERE id='$page_id'";
            $result=$conn->query($sql);
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                echo "<div class='box' ><h1>".$row["title"]."</h1><p class='extra'>By:".$row["name"]."</p><p class='extra'>posted On: ".$row["date"]."</p><img src='/website/uploads/".$row['image']."'><p>".$row['body']."</p></div>";
                echo "<button type='button' class='btn btn-primary' onclick=\"document.location.href='editPost.php?id=".$page_id."'\">Edit</button>";
                echo "<button type='button' class='btn btn-danger' onclick=\"document.location.href='deletePost.php?id=".$page_id."'\">Delete</button>";
            }
            else{
                header('Location: index.php');
            }
         ?>
    </body>
</html>
