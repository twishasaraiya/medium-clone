<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Post</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body class='container-fluid jumbotron'>
        <?php
            include('db.php');
            $page_id=$_GET['id'];
            $sql="SELECT * FROM post WHERE id='$page_id'";
            $result=$conn->query($sql);
            if($result->num_rows==1)
                $row=$result->fetch_assoc();
         ?>
         <h1>Edit the Post!</h1>
         <form class="form-group" action="" method="post" enctype='multipart/form-data'>
             <label>Title</label>
             <input type='text' class='form-control' name='title' value="<?php echo $row['title']?>">
             <label>Image</label>
             <input type='file' name='image'value="">
             <label>Your Story</label>
             <textarea class='form-control' rows='8' name='body'><?php echo $row['body']?></textarea>
             <button type='submit' class='btn btn-success'>Update</button>
         </form>
         <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //var_dump($_POST);
                $target_file="C:/wamp/www/website/uploads/".basename($_FILES['image']['name']);
                if(empty($_POST['title']))
                    $title=$row['title'];
                else
                    $title=$_POST['title'];

                if(empty(basename($_FILES['image']['name'])))
                    $image=$row['image'];
                else{
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file));
                    $image=basename($_FILES['image']['name']);
                }
                if(empty($_POST['body']))
                    $body=$row['body'];
                else
                    $body=$_POST['body'];

                $sql="UPDATE post SET title='$title', image='$image', body='$body' WHERE id='$page_id' ";
                $result=$conn->query($sql);
                if($result==false)
                    echo "Error".$conn->error;
                elseif($result==true){
                    echo "<h3>Post Updated Successfully</h3>";
                    header("Location: /website/");
                }
            }
          ?>
    </body>
</html>
