<?php 
require_once 'config/database.php';
require_once 'user.php';

//Buat object user
//$user = new user($DB_con);

/*if($user->is_loggedin()!="")
{
	$user->redirect('dashboard.php');

}*/

if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txt_uname']);
	$umail = trim($_POST['txt_umail']);
	$upass = trim($_POST['txt_upass']);

		if($uname==""){	
			$error[] = "provide username !";
		}
		else if($umail==""){
			$error[] = "provide email id !";
		}
		else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)){
			$error[] = "Please enter a valid email address !";
		}
		else if($upass==""){
			$error = "password must be filled !";
		}
		else if(strlen($upass) < 6){
			$error[] = "Password must be atleast 6 characters";
		}
		else
		{
			try
			{
				
				 $stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
        		 $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
        		 $row=$stmt->fetch(PDO::FETCH_ASSOC);

				if($row['user_name']==$uname){
					$error[] = "sorry username or email already taken !";
				}
				else if($row['user_email']==$umail){
					$error[] = "sorry email or username already taken !";
				}
				else
				{
					if($user->register($uname, $umail, $upass))
					{
						$user->redirect('signup.php?joined');
						
					}
				}
			}
			catch (PDOException $e)
			{
				echo $e->getMessage();
			}

		}	
}

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<title>Sign Up</title>
 	<meta http-equip="Content-Type" content="text/html; charset=utf-8" />
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="libs/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="libs/css/css-login.css" />
 </head>
 <body>
<div class="container">
	<div class="form-container">
		<form method="post">
			<h2>Sign Up</h2><hr/>
			<?php
			if(isset($error))
			{
				foreach ((array) $error as $error)
				 {
					?>
					<div class="alert alert-danger">
						<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
					</div>
					<?php
				}
			}
			else if(isset($_GET['joined']))
			{
				?>
				<div class="alert alert-info">
					<i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href="login.php">login &nbsp;</a>here
				</div>
				<?php
			}
 			?>

 			<div  class="form-group">
 				<input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
 			</div>

 			<div  class="form-group">
 				<input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
 			</div>

 			<div  class="form-group">
 				<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
 			</div>

 			<div class="clearfix"></div><hr/>
 			
 			<div class="form-group">
 				<button type="submit" class="btn btn-block btn-primary" name="btn-signup">
 					<i class="glyphicon glyphicon-open-file"></i> &nbsp; SIGN UP
 				</button>
 			</div>
 			<br>
 			<label>have an account ! <a href="login.php">Sign in</a></label>
 			<form>
 			</div>
 		</div>
 </body>
 </html>