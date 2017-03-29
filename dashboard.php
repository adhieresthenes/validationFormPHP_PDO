<?php 
include_once 'config/database.php';

if(!$user->is_loggedin())
{
	$user->redirect('login.php');
}

/*$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);*/
 ?>
 <html>
 <head>
 	<title>Welcome - <?php print($userRow['user_email']); ?></title>
 </head>
 <body>
 	<div class="header">
 		<div class="left">
 			<label> <a href="login.php">Halaman Depan Dari Dashboard!</a></label>
 		</div>
 		<div class="right">
 			<label> <a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i>logout</a></label>
 		</div>
 	<div>
 	<div class="content">
 		<!--	Welcome : <?php print($userRow['user_name']) ?> -->
 	</div>		
 </body>
 </html>