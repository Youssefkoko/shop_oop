<?php 
// require_once '../inc/header.php';
require_once '../classes/Adminloging.php';

$adminLog = new Adminloging();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	# code...
	// Sanitize POST data
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	
	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);

	$logingCheck = $adminLog->adminLogin($adminUser, $adminPass);
}


?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div class="err">
			<?php if (isset($logingCheck)){
				echo $logingCheck;
			}?>
			</div>
			<div>
				<input type="text" placeholder="Username" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>