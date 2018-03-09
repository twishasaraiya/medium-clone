
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' href='./css/posts.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

</head>
<html>
<body class='wrapper'>
    <?php
        include('./model/header.php');
     ?>
     <form action="./model/newPostForm.php" method='GET'>
     <button class=' add-post' <?php if(!isset($_SESSION['login'])){ ?> disabled <?php } ?>>+</button>
     </form>
    <div class=''>
<?php

include('./model/db.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,name,title,date,image,body,likes
        FROM POST
        ORDER BY id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $body=htmlspecialchars_decode($row['body']);
        $text=preg_replace('/((\w+\W*){19}(\w+))(.*)/','${1}',$body);
        echo "<div class='box'> <a href='./model/viewPost.php?id=". $row["id"] . "'><h1>". htmlspecialchars_decode($row["title"])."</h1></a><p class='extra'>By:".$row['name']."</p><p class='extra'>Posted On" . $row["date"] . "</p><p>"."<img class='img-responsive' src='uploads/".$row["image"]."' /></p><p>".$text."</p>
        <div class='row'><div class='text-center col-md-6 fa-2x'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i></div>
        <div class='share text-center col-md-6'><i class='fa fa-thumbs-o-down fa-2x' aria-hidden='true'></i></div>
        </div></div>";
    }
} else {
    echo "No Posts.Go Create One!";
}

$conn->close();
?>

</div>
</body>
<script type="text/javascript">
    $(".fa-thumbs-o-up").click(function(){
        if(!$(this).hasClass('like')){
            $(this).addClass('like');
            var b=$(this).parent().text();
            b++;
            $(this).text(b);
            $(this).addClass('disabled');
        }
    });
</script>
</html>
