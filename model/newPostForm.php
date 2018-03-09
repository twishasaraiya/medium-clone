<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
</head>
<body class="container-fluid jumbotron">
<h1>Welcome to my Blog</h1>
<h3>Share your story...</h3>
<form action="postNew.php" method="post" name='myform' onsubmit='return validateForm()' class="form-group" enctype="multipart/form-data">
    <!--<label>Name</label>
    <input type="text" id="name" name="name" value="" class="form-control">-->
    </input>
    <label>Title</label>
    <input type="text" id="title" name="title" value="" class="form-control">
    <label>Upload Image</label>
    <input type="file" name="image" value="">
    <label>Your Story</label>
    <textarea rows="5" id="body" name="body" value="" class="form-control"></textarea>
    <input class="btn btn-info" type="submit" value="Submit"></input>
</form>
</body>
</html>
