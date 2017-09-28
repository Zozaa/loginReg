<?php
include_once 'class.user.php';  

$user = new User(); 

 if (isset($_POST['submit'])){

	extract($_POST);

	$register = $user->registration($username, $email, $password, $repeated_password);

	if ($register)
	{
		echo 'Registracija uspesna <a href="login.php">Klikni ovde </a> da se ulogujes';
	} else{
		echo 'Registracija nije uspela. Email ili Username vec postoje, pokusaj ponovo';
	}
 }
 ?>
  <!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Registracija</title>
  </head>

  <body>
      <h1>REGISTRUJ SE</h1>
      
       <form action="" method="post" name="reg">
            
		   <p>Korisnicko ime:</p>
            <input type="text" name="username" required>
            
			<p>Email:</p>
			<input type="email" name="email" required><br>
           
		   <p>Password:</p>
			<input type="password" name="password" required>
			
			
			<p>Ponovi Password:</p>
			<input type="password" name="repeated_password" required>
			<input class="btn" type="submit" name="submit" value="Registruj se"><br>
			<a href="login.php">Ipak imas nalog ?      Klikni ovde da se ulogujes!</a>
      </form>
   