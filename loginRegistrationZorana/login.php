<?php

	 session_start();

	 include_once 'class.user.php';

	 $user = new User();

	 if (isset($_POST['submit'])) {

		 $login = $user->login();

		 
			header("location:home.php");
		

	 }
?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

	<h1>Ulogujte se</h1>

	<form action="" method="post" name="login">

		<p>Email:</p>

		<input type="text" name="email" required=""><br>

		<p>Password:</p>

		<input type="password" name="password" required=""><br>

		<input type="submit" name="submit" value="Login"><br>
				
		<a href="registration.php">Registracija novog korisnika</a>
	</form>
