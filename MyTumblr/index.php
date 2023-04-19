<?php
//start the session
session_start();

//create a pre defined username and password if you dont have a database
$my_username = "ChesterLuke";
$my_password = "12345";
$my_name = "Chester Luke A. Maligaso";
$my_address = "Libtangin, Gasan, Marinduque";

//check the url for the redirection
$url_add = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

//condition to know if the button is clicked
if (isset($_POST['login']) === true){
	if($_REQUEST['username'] != $my_username && $_REQUEST['password'] != $my_password){
		header("Location: ".$url_add."?notexist");
	}

	else if($_REQUEST['username'] == $my_username && $_REQUEST['password'] != $my_password){
		header("Location: ".$url_add."?wrongpassword");
	}

	else if($_REQUEST['username'] == $my_username && $_REQUEST['password'] == $my_password){
		header("Location: ".$url_add."?success");

		$_SESSION['session_username'] = $my_username;
		$_SESSION['session_password'] = $my_password;
		$_SESSION['session_name'] = $my_name;
		$_SESSION['session_address'] = $my_address;
	}
}


?>




<!doctype html>
<html lang="en">
  <head>
  	<title>MyTumblr Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">MyTumblr Login</h3>
						


					<form class="login-form" method="POST">

		      		<div class="form-group">

						<?php

					if(isset($_REQUEST['notexist']) === true){
						echo "<div class='alert alert-danger' role='alert'>Username does not exist..</div>";
					}
					else if(isset($_REQUEST['wrongpassword']) === true){
						echo "<div class='alert alert-warning' role='alert'>Wrong Password</div>";
					}
					else if(isset($_REQUEST['success']) === true){
						echo "<div class='alert alert-success' role='alert'>Redirecting..</div>";
						header("Refresh: 3; account.php");
					}
					else if(isset($_REQUEST['logout']) === true){
						echo "<div class='alert alert-info' role='alert'>Thank you...</div>";
					}
					else if(isset($_REQUEST['loginfirst']) === true){
						echo "<div class='alert alert-info' role='alert'>Please log in first</div>";
					}
					else if(isset($_SESSION['session_username']) === true){
						echo "<div class='alert alert-warning' role='alert'>You are still log in. Please click <a href='account.php'>here</a> to proceed.</div>";
					}
						?>

		      			<input type="text" class="form-control rounded-left" placeholder="Username" name="username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="login">Get Started</button>
	            </div>
	          </form>


	        </div>
				</div>
			</div>
		</div>
	</section>

  <!--<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->

	</body>
</html>

