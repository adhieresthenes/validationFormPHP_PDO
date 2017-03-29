<?php 
require_once 'config/database.php';
require_once 'user.php';

//Buat object user
$user = new User($DB_con);

if($user->is_loggedin()!="")
{
  $user->redirect('dashboard.php');
}

if(isset($_POST['btn-login']))
{
  $uname = $_POST['txt_uname_email']; //username
  $umail = $_POST['txt_uname_email']; //user email
  $upass = $_POST['txt_password'];    //user password
    
    if($user->login($uname,$umail,$upass))
    {
      header ('Location: dashboard.php');
    }else{
      $error="Try again, please input correct email & password";
    }
}
?>

<html>
    <head>
        <title> Form Login</title>
        <meta http-equip="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="libs/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="libs/css/css-login.css" />
    </head>
    <body>
    <div class="container">
        <div class="-form-container">
            <form method="post">
              <h2>Sign in</h2></hr>
              <?php
              if(isset($error))
              {
                ?>
                <div class="alert alert-danger">
                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>!
                </div>
                <?php
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
              </div>     
            
              <div class="form-group">
                <input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
              </div>     
              
              <div class="clearfix"></div></hr>
              <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-block-primary">
                  <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN </button>
              </div>     
            </br>
            <label> Don't have account yet ! <a href="signup.php">Sign Up</a></label>
          </form>
        </div>
    </div>
        </div>
</body>
</html> 