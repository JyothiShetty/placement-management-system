<?php include '../db.php'; ?>
<?php ob_start(); ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Admin Login</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="css/font-awesome.min.css" rel="stylesheet">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/templatemo-style.css" rel="stylesheet">
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <div class="square"></div>
	          <h1>Admin Login</h1>
	        </header>
	        <form  action="login.php" class="templatemo-login-form" method="POST">
						<div class=" form-group">
						<label class="control-label templatemo-block">Department</label>
						<select class="form-control" name="dept">
							<option value="ComputerScience">ComputerScience</option>
							<option value="InformationScience">InformationScience</option>
							<option value="Mechanical">Mechanical</option>
							<option value="Electrical">Electrical</option>
							<option value="Civil">Civil</option>
						</select>
					</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
		              	<input type="password" class="form-control" placeholder="******" name="password">
		          	</div>
	        	</div>
	          	<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
						<label for="c1"><span></span>Remember me</label>
				    </div>
				</div>
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100">Login</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Not a registered user yet? <strong><a href="register.php" class="blue-text">Sign up now!</a></strong></p>
		</div>
        <div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
		<p><strong><a href="../index.php" class="blue-text">HOME</a></strong></p>
		</div>
	</body>
</html>

<?php
if(isset($_POST['dept']) && isset($_POST['password'])){

	$dept=trim($_POST['dept']);
	$the_password=trim($_POST['password']);
	$query="SELECT * FROM admin WHERE dept='{$dept}'";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("LOGIN FAILED".mysqli_error($connection));
	}


	while($row=mysqli_fetch_assoc($result)){

		$db_password=$row['password'];
		$db_dept=$row['dept'];
		$db_email=$row['email'];

	}
		$password=crypt($the_password,$db_password);
	 	if($dept === $db_dept && $db_password===$password){

					echo 'verified user';
					$_SESSION['email']=$db_email;
					$_SESSION['dept']=$dept;
					header("Location:./hello.php");

		}


		}


 ?>
