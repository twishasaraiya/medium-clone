<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
        <div class="page-header">
            <div class="row">
                <div class="col-md-8">
                    <h1>Connect</h1>
                </div>
                <div class="col-md-4">
                    <?php
                        session_start();
                        //var_dump($_SESSION);
                     if(isset($_SESSION['login'])){ ?>
                        <a href="model/login.php"><button class='btn btn-primary'>Logout
                        </button></a>
                        <h4>
                        <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
                        <?php echo $_SESSION['login']; ?> </h4>
                    <?php }else{ ?>
                        <a href="#"><button class='btn btn-primary' data-toggle="modal" data-target="#loginModal">Login</button></a>
                    <?php  }?>
                    </div>

                    <!-- Modal Login Form -->
                    <!-- Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Login</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                            <form action="model/login.php" action="get" class='form-group'>
                                <label>Name</label>
                                <input type='text' name='name' placeholder='Rahul Singh' class='form-control'></input>
                            <label>Password</label>
                                <input type='password' name='pwd' placeholder='abc' class='form-control'></input>
                        <button type='submit'class='btn btn-success btn-block'>Login</button>
                        <div class='row'>
                            <div class='col-md-6'>
                                <a href='model/register.html'>New User?</a></div>
                            <div class='col-md-6'>
                                <a href='#'>Forgot Password?</a></div>
                        </div>
                            </form>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>
